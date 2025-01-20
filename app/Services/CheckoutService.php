<?php

namespace App\Services;

use App\Models\Classroom;
use App\Models\Product;
use App\Models\User;

class CheckoutService
{
    public function getCheckoutData(User $user): array{
        return [
            "products" => (new ProductService())->getProductsInChart($user),
            "shippingCost" => (new AdminService())->getDeliveryCost(),
            "total" => (new ProductService())->getCheckoutTotalPrice($user),
            "classrooms" => Classroom::query()->get()
        ];
    }
}
