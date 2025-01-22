<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\DatabaseNotification;

class NotificationService
{
    /**
     * @param User $user
     * @return Collection<DatabaseNotification>
     */
    public function getNotifications(User $user): Collection{
        return $user->notifications()->get();
    }
}
