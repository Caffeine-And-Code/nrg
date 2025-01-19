<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function addProductToCart(User $user, Product $product){
        $productInCartQuery = $user->cartProducts()->where("product_id", $product->id);
        if($productInCartQuery->count() > 0){
            $quantity = $productInCartQuery->get(["quantity"]);
            $productInCartQuery->update(["quantity" => $quantity[0]->quantity + 1]);
        }
        else {
            $user->cartProducts()->attach($product->id, ["quantity" => 1]);
        }
    }

    public function canCreateOrder(User $user): bool{
        return $user->cartProducts()->count() > 0;
    }

    public function createOrder(User $user, Carbon $deliveryTime, int $classroomId): Order{
        $total = (new ProductService())->getCheckoutTotalPrice($user);
        $discountUsable = $this->getUsableCredit($user, $total);
        /** @var Order $order */
        DB::beginTransaction();
        $order = $user->orders()->create([
            "number" => (new OrderService())->getNextNumber(),
            "delivery_time" => $deliveryTime,
            "used_portfolio" => $discountUsable,
            "delivery_cost" => (new AdminService())->getDeliveryCost(),
            "classroom_id" => $classroomId,
            "total" => $total,
        ]);
        $user->setDiscountPortfolio(max($user->getDiscountPortfolio() - $discountUsable, 0));
        $user->setTotalSpent($user->getTotalSpent() + $total);
        $user->save();
        /** @var Collection<Product> $productsInCart */
        $productsInCart = (new ProductService())->getProductsInChart($user);
        foreach ($productsInCart as $productInCart){
            $order->products()->attach($productInCart, [
                "quantity" => $productInCart->getCartUsers()->first()->quantity,
                "bought_price" => $productInCart->getPrice(),
                "bought_perc_discount" => $productInCart->getPercDiscount()]);
        }
        $user->cartProducts()->detach();
        //TODO: Check fidelty meter
        DB::commit();
        return $order;
    }

    public function getUsableCredit(User $user, float $total): float
    {
        $discount = $user->getDiscountPortfolio();
        return min($discount, $total);
    }
}
