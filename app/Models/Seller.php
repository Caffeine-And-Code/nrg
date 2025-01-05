<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Seller extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\SellerFactory> */
    use HasFactory;

    protected $fillable = ['email', 'password', 'fidelity_target', 'fidelity_price'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
