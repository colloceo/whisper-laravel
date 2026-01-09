<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\DailyReminderNotification;
use Illuminate\Console\Command;

class SendDailyReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whispr:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily check-in reminders to users who have opted in';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('daily_reminders', true)->get();

        $count = 0;
        foreach ($users as $user) {
            // Only send if they haven't received one in the last 20 hours to avoid double-sending
            $exists = $user->notifications()
                ->where('data->type', 'daily_reminder')
                ->where('created_at', '>=', now()->subHours(20))
                ->exists();

            if (!$exists) {
                $user->notify(new DailyReminderNotification());
                $count++;
            }
        }

        $this->info("Successfully sent {$count} daily reminders.");
    }
}
