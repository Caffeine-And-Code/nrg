<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['enabled', 'reusable', 'used', 'valid_since', 'percentage_amount', 'cumulative'];

    public function commands()
    {
        return $this->hasMany(Command::class);
    }
}