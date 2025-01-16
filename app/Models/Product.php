<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['image', 'name', 'description', 'price', 'perc_discount', 'product_type_id'];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function carts()
    {
        return $this->belongsToMany(User::class, 'products_in_carts')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'products_in_order')
            ->withPivot('bought_price', 'bought_perc_discount', 'quantity')
            ->withTimestamps();
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
