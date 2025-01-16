<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['email', 'username', 'password', 'fm_prize', 'fm_target', 'delivery_cost'];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function spinWheelEntries()
    {
        return $this->hasMany(SpinWheelEntry::class);
    }
}
