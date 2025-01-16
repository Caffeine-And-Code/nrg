<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['image', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
