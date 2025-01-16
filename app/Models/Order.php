<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number',
        'delivery_time',
        'used_portfolio',
        'delivery_cost',
        'user_id',
        'order_status_id',
        'classroom_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_in_order')
            ->withPivot('bought_price', 'bought_perc_discount', 'quantity')
            ->withTimestamps();
    }
}
