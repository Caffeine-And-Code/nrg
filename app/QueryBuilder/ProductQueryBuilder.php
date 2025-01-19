<?php

namespace App\QueryBuilder;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Product first($columns = ['*'])
 */
class ProductQueryBuilder extends Builder
{
    public function bestBuy(): ProductQueryBuilder
    {
        return $this->limit(5);
    }

    public function search($name): ProductQueryBuilder
    {
        return $this->where('name', 'like', "%{$name}%");
    }
}
