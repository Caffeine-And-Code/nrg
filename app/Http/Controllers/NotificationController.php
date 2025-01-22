<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class NotificationController extends Controller
{
    public function show(Request $request){
        $formData = $request->validate([
            "mark_as_read" => ["boolean"],
        ]);
        /** @var User $user */
        $user = auth()->user();
        $notifications = (new NotificationService())->getNotifications($user);
        if(isset($formData["mark_as_read"]) && $formData["mark_as_read"]){
            $notifications->each(fn (DatabaseNotification $notification) => $notification->markAsRead());
        }
        return view('user.notifications', compact('notifications'));
    }

    /**
     * @throws InternalErrorException
     */
    public function read(Request $request){
        $formData = $request->validate([
            "id" => "required|exists:notifications,id",
        ]);

        /** @var User $user */
        $user = auth()->user();
        /** @var DatabaseNotification $notification */
        $notification = $user->notifications()->find($formData["id"]);
        if($notification === null){{
            throw new InternalErrorException("no notification found");
        }}
        $notification->markAsRead();
        return redirect()->back();
    }
}
