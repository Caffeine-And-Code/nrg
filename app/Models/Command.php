<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    /** @use HasFactory<\Database\Factories\CommandFactory> */
    use HasFactory;

    protected $fillable = ['status', 'total', 'discountAmount', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
