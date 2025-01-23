<?php

namespace App\Services;

use App\Models\Admin;
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

    /**
     * @param Admin $admin
     * @return Collection<DatabaseNotification>
     */
    public function getNotificationsAdmin(Admin $user): Collection{
        return $user->notifications()->get();
    }
}
