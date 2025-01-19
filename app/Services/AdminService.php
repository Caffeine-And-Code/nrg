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

    public function getFidelityMeterTarget(): float
    {
        return Admin::query()->first()->getFmTarget();
    }

    public function getFidelityMeterPrice(): float
    {
        return Admin::query()->first()->getFmPrize();
    }


}
