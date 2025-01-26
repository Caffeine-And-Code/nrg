<?php

namespace App\Services;

use App\Models\Classroom;
use App\Models\Product;
use App\Models\User;

class CheckoutService
{
    public function getCheckoutData(User $user): array{
        $total = (new ProductService())->getCheckoutTotalPrice($user);
        $discount = (new UserService())->getUsableCredit($user, $total);
        return [
            "products" => (new ProductService())->getProductsInChart($user),
            "shippingCost" => (new AdminService())->getDeliveryCost(),
            "total" => $total - $discount,
            "discount" => $discount,
            "classrooms" => Classroom::query()->get()
        ];
    }
}
