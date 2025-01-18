<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductType
 *
 * @property int $id
 * @property string $name
 */
class ProductType extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => 'string',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ProductType
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ProductType
    {
        $this->name = $name;
        return $this;
    }


}
