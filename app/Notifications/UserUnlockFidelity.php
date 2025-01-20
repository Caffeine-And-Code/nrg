<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserUnlockFidelity extends Notification
{
    use Queueable;

    public float $target;
    public float $price;

    /**
     * Create a new notification instance.
     */
    public function __construct(float $target, float $price)
    {
        $this->target = $target;
        $this->price = $price;
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
        return (new MailMessage)
                    ->subject("Congratulation! you have unlocked your fidelity discount")
                    ->line("Spending € {$this->target} in our store you won our prize of €{$this->price}")
                    ->action("See now our products", route("user.home"));
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
