<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpinWheelEntry extends Model
{
    protected $fillable = ['text', 'prize', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
