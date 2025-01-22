<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPaidAdminNofication extends Notification
{
    use Queueable;
    private Order $order;
    private bool $forUser = false;

    /**
     * Get the notification's database type.
     *
     * @param object $notifiable
     * @return string
     */
    public function databaseType(object $notifiable): string
    {
        return 'order-paid-admin';
    }

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order, bool $forUser = false)
    {
        $this->order = $order;
        $this->forUser = $forUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->getTitle())
            ->line($this->getMessage());
    }

    public function getTitle(): string{
        return "New Order number {$this->order->getNumber()} confirmed";
    }

    public function getMessage(): string{
        $message = "The order have to be delivered on {$this->order->getDeliveryTime()->toDateTimeLocalString()}";
        if($this->order->getClassroomId() !== null){
            $message .= " in class: {$this->order->classroom()->first()->getName()}";
        }
        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->getTitle(),
            'message' => $this->getMessage(),
        ];
    }
}
