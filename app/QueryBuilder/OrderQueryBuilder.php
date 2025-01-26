<?php

namespace App\QueryBuilder;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method Order first($columns = ['*'])
 */
class OrderQueryBuilder extends Builder
{
    public function withProductRating($uId): self
    {
        return $this->with('products.ratings', function (HasMany $query) use ($uId) {
            $query->where("user_id", $uId);
        });
    }
}
