<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'total', 'user_id', 'discount_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function deliveries()
    {
        return $this->hasOne(Delivery::class);
    }
}