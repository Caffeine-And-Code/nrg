<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductsInCart extends Pivot
{
    protected $fillable = ['user_id', 'product_id', 'quantity'];
}
