<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'class_product', 'class_id', 'product_id');
    }
}
