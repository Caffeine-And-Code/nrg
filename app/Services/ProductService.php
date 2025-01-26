<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;

class ProductService
{
    public function getProductsInChart(User $user): \Illuminate\Database\Eloquent\Collection
    {
        return Product::query()->withCartQuantity($user)->inCart($user)->get();
    }

    public function getCheckoutTotalPrice(User $user): float{
        $shippingCost = (new AdminService())->getDeliveryCost();
        $total = ($this->getProductsInChart($user))->sum(function (Product $product) use ($shippingCost){
            return ($product->getPrice() * (100 - $product->getPercDiscount())/100) * $product->getCartUsers()->first()->quantity;
        }) + $shippingCost;
        return $total;
    }
}
