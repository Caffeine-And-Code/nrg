<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $datetime
 * @property int|null $user_id
 * @property int|null $admin_id
 */
class Notification extends Model
{
    use HasFactory;

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'datetime' => 'datetime',
        'user_id' => 'integer',
        'admin_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Notification
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Notification
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Notification
    {
        $this->description = $description;
        return $this;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }

    public function setDatetime(string $datetime): Notification
    {
        $this->datetime = $datetime;
        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): Notification
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getAdminId(): ?int
    {
        return $this->admin_id;
    }

    public function setAdminId(?int $admin_id): Notification
    {
        $this->admin_id = $admin_id;
        return $this;
    }


}
