<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SpinWheelEntry
 *
 * @property int $id
 * @property string $text
 * @property float $prize
 * @property int $admin_id
 */
class SpinWheelEntry extends Model
{
    use HasFactory;

    protected $casts = [
        'text' => 'string',
        'prize' => 'float',
        'admin_id' => 'integer',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): SpinWheelEntry
    {
        $this->id = $id;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): SpinWheelEntry
    {
        $this->text = $text;
        return $this;
    }

    public function getPrize(): float
    {
        return $this->prize;
    }

    public function setPrize(float $prize): SpinWheelEntry
    {
        $this->prize = $prize;
        return $this;
    }

    public function getAdminId(): int
    {
        return $this->admin_id;
    }

    public function setAdminId(int $admin_id): SpinWheelEntry
    {
        $this->admin_id = $admin_id;
        return $this;
    }


}
