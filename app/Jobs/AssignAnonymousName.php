<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Str;

class AssignAnonymousName implements ShouldQueue
{
    use Queueable;

    public User $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Simulation of Gemini AI Call
        $adjectives = ['Calm', 'Serene', 'Gentle', 'Quiet', 'Peaceful', 'Happy', 'Brave'];
        $nouns = ['River', 'Mountain', 'Sky', 'Breeze', 'Ocean', 'Tree', 'Star'];

        $randomName = $adjectives[array_rand($adjectives)] . $nouns[array_rand($nouns)] . rand(10, 99);

        $this->user->update([
            'anonymous_username' => $randomName
        ]);
    }
}
