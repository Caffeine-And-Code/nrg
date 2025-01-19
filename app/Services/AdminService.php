<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Product;
use App\Models\User;

class AdminService
{
    public function getDeliveryCost(): float
    {
        return Admin::query()->first()->getDeliveryCost();
    }
}
