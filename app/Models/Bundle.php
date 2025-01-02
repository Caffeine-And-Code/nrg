<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image_path'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'bundle_product', 'bundle_id', 'product_id');
    }
}