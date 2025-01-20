<?php

namespace App\Services;

use App\Models\Classroom;
use App\Models\Notification;
use App\Models\Product;
use App\Models\User;

class NotificationService
{
    public function getNotifications(User $user): \Illuminate\Database\Eloquent\Collection{
        return Notification::query()->where("user_id", $user->getId())->get();
    }
}
