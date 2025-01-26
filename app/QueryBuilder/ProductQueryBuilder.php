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
        return $this->with('orders') // Include related orders
        ->select('products.*')
            ->withCount(['orders as total_quantity' => function ($query) {
                $query->selectRaw('SUM(products_in_order.quantity)');
            }])
            ->orderByDesc('total_quantity') // Order by total quantity sold
            ->limit(5);
    }

    public function search(string $name, int|null $productType=null): ProductQueryBuilder
    {
        $query = $this->where('name', 'like', "%{$name}%");
        if($productType) {
            $query->where('product_type_id', $productType);
        }
        return $query;
    }

    public function inType(int|null $productType=null): ProductQueryBuilder
    {
        if($productType) {
            return $this->where('product_type_id', $productType);
        }
        return $this;
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
