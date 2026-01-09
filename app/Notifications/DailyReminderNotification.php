<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DailyReminderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $greetings = [
            "Time for a quick check-in?",
            "How has your day been so far?",
            "Your journal is waiting for your thoughts.",
            "Take a moment for yourself today.",
            "Reflect on a positive moment from today."
        ];

        return [
            'type' => 'daily_reminder',
            'message' => $greetings[array_rand($greetings)],
            'action_url' => route('journal'),
        ];
    }
}
