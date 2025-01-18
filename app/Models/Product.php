<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property int $id
 * @property string|null $image
 * @property string $name
 * @property string $description
 * @property float $price
 * @property float|null $perc_discount
 * @property int $product_type_id
 */
class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'image' => 'string',
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'perc_discount' => 'float',
        'product_type_id' => 'integer',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'products_in_order')
            ->withPivot('bought_price', 'bought_perc_discount', 'quantity')
            ->withTimestamps();
    }

    public function cartUsers()
    {
        return $this->belongsToMany(User::class, 'products_in_carts')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): Product
    {
        $this->image = $image;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    public function getPercDiscount(): ?float
    {
        return $this->perc_discount;
    }

    public function setPercDiscount(?float $perc_discount): Product
    {
        $this->perc_discount = $perc_discount;
        return $this;
    }

    public function getProductTypeId(): int
    {
        return $this->product_type_id;
    }

    public function setProductTypeId(int $product_type_id): Product
    {
        $this->product_type_id = $product_type_id;
        return $this;
    }


}
