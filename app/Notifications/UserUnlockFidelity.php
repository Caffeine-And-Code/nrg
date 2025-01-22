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
     * Get the notification's database type.
     *
     * @param object $notifiable
     * @return string
     */
    public function databaseType(object $notifiable): string
    {
        return 'unlock-fidelity-user';
    }

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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject($this->getTitle())
                    ->line($this->getMessage())
                    ->action("See now our products", route("user.home"));
    }

    public function getTitle(): string{
    return "Congratulation! you have unlocked your fidelity discount";
}

    public function getMessage(): string{
        return "Spending € {$this->target} in our store you won our prize of €{$this->price}";
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
