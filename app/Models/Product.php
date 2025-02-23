<?php

namespace App\Models;

use App\QueryBuilder\ProductQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;


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
 * @property Collection|null cartUsers
 * @property Collection|null ratings
 *
 * @method static ProductQueryBuilder query()
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'image',
        'name',
        'description',
        'price',
        'perc_discount',
        'product_type_id',
        'isVisible',
    ];

    protected $casts = [
        'image' => 'string',
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'perc_discount' => 'float',
        'product_type_id' => 'integer',
        'isVisible' => 'boolean',
    ];

    public function newEloquentBuilder($query): ProductQueryBuilder
    {
        return new ProductQueryBuilder($query);
    }

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

    public function getCartUsers(): ?Collection
    {
        return $this->cartUsers;
    }

    public function getRatings(): ?Collection
    {
        return $this->ratings;
    }

    public function getDiscountedPrice(): float
    {
        return $this->price - ($this->price * ($this->perc_discount / 100));
    }

    // uncomment this function to enable the search with meilisearch
    // configuration for meilisearch
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'perc_discount' => $this->perc_discount,
        ];
    }
}
