<?php

namespace App\QueryBuilder;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Product first($columns = ['*'])
 */
class ProductQueryBuilder extends Builder
{
    public function bestBuy(): ProductQueryBuilder
    {
        return $this->take(5);
    }

    public function search(string $name, int|null $productType=null): ProductQueryBuilder
    {
        $query = $this->where('name', 'like', "%{$name}%");
        if($productType) {
            $query->where('product_type_id', $productType);
        }
        return $query;
    }

    public function withCartQuantity(User $user): ProductQueryBuilder
    {
        return $this->with([
                'cartUsers' => function ($query) use ($user) {
                    $query->where('user_id', $user->id)->select("quantity");
                }
            ]);
    }

    public function inCart(User $user): ProductQueryBuilder
    {
        return $this->whereHas('cartUsers', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }

    public function withRating(): ProductQueryBuilder
    {
        return $this->with('ratings');
    }
}
