<?php

namespace App\Notifications;

use Carbon\CarbonInterface;
use App\Models\LeaveRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveRequestStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $leaveNotification;

    /**
     * Create a new notification instance.
     */
    public function __construct(LeaveRequest $leaveNotification)
    {
        $this->leaveNotification = $leaveNotification;
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
        $actionText = $this->leaveNotification->status === 'approve' ? 'Approved' : 'Canceled';
        $actionUrl = url('/leave-request/leave-request-approve/' . $this->leaveNotification->id);

        return (new MailMessage)
            ->line($this->leaveNotification->user->name . ', Your leave request has been ' . $actionText . ' on ' . $this->leaveNotification->created_at)
            ->action('View Leave Request', $actionUrl)
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
