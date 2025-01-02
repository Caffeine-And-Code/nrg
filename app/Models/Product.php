<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'available_on', 'image_path', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_product', 'product_id', 'class_id');
    }

    public function bundles()
    {
        return $this->belongsToMany(Bundle::class, 'bundle_product', 'product_id', 'bundle_id');
    }
}