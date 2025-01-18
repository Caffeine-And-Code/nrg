<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string|null $last_access
 * @property float $total_spent
 * @property float $discount_portfolio
 * @property int|null $last_meter
 */
class User extends Authenticatable
{
    use HasFactory;

    protected $casts = [
        'last_access' => 'datetime',
        'total_spent' => 'float',
        'discount_portfolio' => 'float',
        'last_meter' => 'integer',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function cartProducts()
    {
        return $this->belongsToMany(Product::class, 'products_in_carts')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getLastAccess(): ?string
    {
        return $this->last_access;
    }

    public function setLastAccess(?string $last_access): User
    {
        $this->last_access = $last_access;
        return $this;
    }

    public function getTotalSpent(): float
    {
        return $this->total_spent;
    }

    public function setTotalSpent(float $total_spent): User
    {
        $this->total_spent = $total_spent;
        return $this;
    }

    public function getDiscountPortfolio(): float
    {
        return $this->discount_portfolio;
    }

    public function setDiscountPortfolio(float $discount_portfolio): User
    {
        $this->discount_portfolio = $discount_portfolio;
        return $this;
    }

    public function getLastMeter(): ?int
    {
        return $this->last_meter;
    }

    public function setLastMeter(?int $last_meter): User
    {
        $this->last_meter = $last_meter;
        return $this;
    }


}
