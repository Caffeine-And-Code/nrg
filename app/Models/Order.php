<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $id
 * @property int $number
 * @property string|null $delivery_time
 * @property float $used_portfolio
 * @property float $delivery_cost
 * @property int $user_id
 * @property int $status
 * @property int $total
 * @property int|null $classroom_id
 */
class Order extends Model
{
    const STATUS_CREATED = 0;

    use HasFactory;

    protected $fillable = [
        'number',
        'delivery_time',
        'used_portfolio',
        'delivery_cost',
        'user_id',
        'status',
        'classroom_id',
        'total'
    ];

    protected $casts = [
        'number' => 'integer',
        'delivery_time' => 'datetime',
        'used_portfolio' => 'float',
        'delivery_cost' => 'float',
        'user_id' => 'integer',
        'status' => 'integer',
        'classroom_id' => 'integer',
        'total' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_in_order')
            ->withPivot('bought_price', 'bought_perc_discount', 'quantity')
            ->withTimestamps();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Order
    {
        $this->id = $id;
        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): Order
    {
        $this->number = $number;
        return $this;
    }

    public function getDeliveryTime(): ?string
    {
        return $this->delivery_time;
    }

    public function setDeliveryTime(?string $delivery_time): Order
    {
        $this->delivery_time = $delivery_time;
        return $this;
    }

    public function getUsedPortfolio(): float
    {
        return $this->used_portfolio;
    }

    public function setUsedPortfolio(float $used_portfolio): Order
    {
        $this->used_portfolio = $used_portfolio;
        return $this;
    }

    public function getDeliveryCost(): float
    {
        return $this->delivery_cost;
    }

    public function setDeliveryCost(float $delivery_cost): Order
    {
        $this->delivery_cost = $delivery_cost;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): Order
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): Order
    {
        $this->status = $status;
        return $this;
    }

    public function getClassroomId(): ?int
    {
        return $this->classroom_id;
    }

    public function setClassroomId(?int $classroom_id): Order
    {
        $this->classroom_id = $classroom_id;
        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?int $total): Order
    {
        $this->total = $total;
        return $this;
    }


}
