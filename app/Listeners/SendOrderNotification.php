<?php

namespace App\Listeners;

use App\Events\OrderUpdate;
use App\Models\Order;
use App\Notifications\OrderNotification;
use App\Services\AdminService;

class SendOrderNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderUpdate $event): void
    {
        $user = $event->order->user()->first();
        $user->notify(new OrderNotification($event->order, true));
        if($event->order->getStatus() === Order::STATUS_PAID){
            (new AdminService())->getAdminInstance()->notify(new OrderNotification($event->order, false));
        }
    }
}
