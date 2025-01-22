<?php

namespace App\Listeners;

use App\Events\OrderUpdate;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderCancelledUserNofication;
use App\Notifications\OrderCreatedUserNofication;
use App\Notifications\OrderPaidAdminNofication;
use App\Notifications\OrderPaidUserNofication;
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
        logger()->info("sending email " . $event->order->getId());
        /** @var User $user */
        $user = $event->order->user()->first();
        switch ($event->order->getStatus()){
            case Order::STATUS_PAID:
                $user->notify(new OrderPaidUserNofication($event->order));
                (new AdminService())->getAdminInstance()->notify(new OrderPaidAdminNofication($event->order, false));
                break;
            case Order::STATUS_CREATED:
                $user->notify(new OrderCreatedUserNofication($event->order));
                break;
            case Order::STATUS_CANCELED:
                $user->notify(new OrderCancelledUserNofication($event->order));

        }
    }
}
