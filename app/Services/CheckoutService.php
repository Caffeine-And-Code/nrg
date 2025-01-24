<?php

namespace App\Services;

use App\Models\Classroom;
use App\Models\Product;
use App\Models\User;

class CheckoutService
{
    public function getCheckoutData(User $user): array{
        $total = (new ProductService())->getCheckoutTotalPrice($user);
        return [
            "products" => (new ProductService())->getProductsInChart($user),
            "shippingCost" => (new AdminService())->getDeliveryCost(),
            "total" => $total,
            "discount" => (new UserService())->getUsableCredit($user, $total),
            "classrooms" => Classroom::query()->get()
        ];
    }
}
