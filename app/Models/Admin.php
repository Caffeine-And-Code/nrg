<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 *
 * @property int $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property float $fm_prize
 * @property float $fm_target
 * @property float $delivery_cost
 */
class Admin extends Authenticatable
{
    use HasFactory;

    protected $casts = [
        'fm_prize' => 'float',
        'fm_target' => 'float',
        'delivery_cost' => 'float',
    ];

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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Admin
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Admin
    {
        $this->email = $email;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): Admin
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): Admin
    {
        $this->password = $password;
        return $this;
    }

    public function getFmPrize(): float
    {
        return $this->fm_prize;
    }

    public function setFmPrize(float $fm_prize): Admin
    {
        $this->fm_prize = $fm_prize;
        return $this;
    }

    public function getFmTarget(): float
    {
        return $this->fm_target;
    }

    public function setFmTarget(float $fm_target): Admin
    {
        $this->fm_target = $fm_target;
        return $this;
    }

    public function getDeliveryCost(): float
    {
        return $this->delivery_cost;
    }

    public function setDeliveryCost(float $delivery_cost): Admin
    {
        $this->delivery_cost = $delivery_cost;
        return $this;
    }


}
