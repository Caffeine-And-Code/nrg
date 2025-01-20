<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;
    private Order $order;
    private bool $forUser = false;

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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        if($this->forUser){
            switch ($this->order->getStatus()){
                case Order::STATUS_CREATED:
                default:
                    return (new MailMessage)
                        ->subject("New Order number {$this->order->getNumber()} wait for payment")
                        ->line("We are waiting for your payment.")
                        ->action("See order status", route('user.order_details', ["id" => $this->order->getId()]))
                        ->line('Thank you for using our application!');
                case Order::STATUS_PAID:
                    return (new MailMessage)
                        ->subject("Order number {$this->order->getNumber()} confirmed")
                        ->line("Your order payment has been received.")
                        ->action("See order status", route('user.order_details', ["id" => $this->order->getId()]))
                        ->line('Thank you for using our application!');
                case Order::STATUS_CANCELED:
                    return (new MailMessage)
                        ->subject("Order number {$this->order->getNumber()} has been canceled")
                        ->line("Your order has been canceled as your payment went wrong.");
            }
        }
        else{
            $mail = (new MailMessage)
                ->subject("New Order number {$this->order->getNumber()} confirmed")
                ->line("The order have to be delivered on {$this->order->getDeliveryTime()->toDateTimeLocalString()}");
            if($this->order->getClassroomId() !== null){
                $mail->line("The order have to be delivered in class: {$this->order->classroom()->first()->getName()}");
            }
            return $mail;
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
