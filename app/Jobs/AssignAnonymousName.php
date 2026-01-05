<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\AiService;
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
    public function handle(AiService $aiService): void
    {
        $randomName = $aiService->generateUsername();

        $this->user->updateQuietly([
            'anonymous_username' => $randomName
        ]);
    }
}
