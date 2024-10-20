<?php

namespace App\Notifications;

use App\Models\User;
use Carbon\CarbonInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmployeeCreateNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $employeeCreate;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $employeeCreate)
    {
        $this->employeeCreate = $employeeCreate;
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
        $actionUrl = url('/');

        return (new MailMessage)
            ->line($this->employeeCreate->name . ', Your account has been created on ' . $this->employeeCreate->created_at)
            ->action('Login Here', $actionUrl)
            ->line('Thank you!');
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
