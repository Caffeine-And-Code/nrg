<?php

namespace App\Services;

use App\Events\OrderUpdate;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use App\Notifications\UserUnlockFidelity;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class UserService
{
    public function addProductToCart(User $user, Product $product, int $quantity = 0): void
    {
        $productInCartQuery = $user->cartProducts()->where("product_id", $product->id);
        if($productInCartQuery->count() > 0){
            $quantity = $quantity <= 0 ? $productInCartQuery->get(["quantity"])[0]->quantity  + 1 : $quantity;
            $productInCartQuery->update(["quantity" => $quantity]);
        }
        else {
            $quantity = $quantity <= 0 ? 1 : $quantity;
            $user->cartProducts()->attach($product->id, ["quantity" => $quantity]);
        }
    }

    public function removeProductFromCart(User $user, Product $product): void
    {
        $user->cartProducts()->detach($product->id);
    }

    public function canCreateOrder(User $user): bool{
        return $user->cartProducts()->count() > 0;
    }

    public function createOrder(User $user, Carbon $deliveryTime, int $classroomId): string{
        $total = (new ProductService())->getCheckoutTotalPrice($user);
        $discountUsable = $this->getUsableCredit($user, $total);
        $total -= $discountUsable;
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
        Event::dispatch(new OrderUpdate($order));
        $checkout_url = $user->checkoutCharge(
            round($order->getTotal()*100),
            "Order n.{$order->id}",
            1,
            [
                "success_url" => route("user.checkout_success").'?session_id={CHECKOUT_SESSION_ID}',
                "cancel_url" => route("user.checkout_error").'?session_id={CHECKOUT_SESSION_ID}',
                "metadata" => ["order_id" => $order->getId()]
            ])
            ->asStripeCheckoutSession()
            ->url;
        DB::commit();
        return $checkout_url;
    }

    public function getUsableCredit(User $user, float $total): float
    {
        $discount = $user->getDiscountPortfolio();
        return min($discount, $total/2);
    }

    public function updateFidelity(User $user, Order $order): bool
    {
        $user->setTotalSpent($user->getTotalSpent() + $order->getTotal())->save();
        $user->setLastMeter($user->getLastMeter() + $order->getTotal())->save();
        if($user->getLastMeter() >= (new AdminService())->getFidelityMeterTarget()){
            $user->notify(new UserUnlockFidelity(
                (new AdminService())->getFidelityMeterTarget(),
                (new AdminService())->getFidelityMeterPrice())
            );
            while ($user->getLastMeter() >= (new AdminService())->getFidelityMeterTarget()){
                $user->setDiscountPortfolio($user->getDiscountPortfolio() + (new AdminService())->getFidelityMeterPrice())
                ->save();
                $rest = $user->getLastMeter() - (new AdminService())->getFidelityMeterTarget();
                $user->setLastMeter($rest)->save();
            }
            return true;
        }
        return false;
    }
}
