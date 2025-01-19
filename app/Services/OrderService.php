<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class OrderService
{
    public function getNextNumber(): int
    {
        return Order::query()->max("number") + 1;
    }

    public function getOrders(User $user): \Illuminate\Database\Eloquent\Collection
    {
        return Order::query()->orderBy('id', 'desc')->where("user_id", $user->getId())->get();
    }

}
