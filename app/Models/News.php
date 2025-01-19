<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 *
 * @property int $id
 * @property string $image_path
 * @property int $admin_id
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'admin_id',
    ];

    protected $casts = [
        'image_path' => 'string',
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

    public function setId(int $id): News
    {
        $this->id = $id;
        return $this;
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }

    public function setImagePath(string $image_path): News
    {
        $this->image_path = $image_path;
        return $this;
    }

    public function getAdminId(): int
    {
        return $this->admin_id;
    }

    public function setAdminId(int $admin_id): News
    {
        $this->admin_id = $admin_id;
        return $this;
    }


}
