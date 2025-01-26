<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rating
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $rating
 */
class Rating extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id' => 'integer',
        'product_id' => 'integer',
        'rating' => 'integer',
    ];

    protected $fillable = [
        "user_id",
        "product_id",
        "rating",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Rating
    {
        $this->id = $id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): Rating
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): Rating
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): Rating
    {
        $this->rating = $rating;
        return $this;
    }
}
