<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderStatus
 *
 * @property int $id
 * @property string $name
 */
class OrderStatus extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => 'string',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): OrderStatus
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): OrderStatus
    {
        $this->name = $name;
        return $this;
    }


}
