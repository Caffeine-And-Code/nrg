<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductsInOrder extends Pivot
{
    protected $fillable = ['order_id', 'product_id', 'bought_price', 'bought_perc_discount', 'quantity'];
}
