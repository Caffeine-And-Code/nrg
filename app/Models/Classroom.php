<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Classroom
 *
 * @property int $id
 * @property string $name
 */
class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Classroom
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Classroom
    {
        $this->name = $name;
        return $this;
    }


}
