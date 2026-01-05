<?php

namespace App\Observers;

use App\Models\User;

use App\Jobs\AssignAnonymousName;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // 1. Set a quick local fallback name first
        $adjectives = ['Calm', 'Serene', 'Gentle', 'Quiet', 'Peaceful', 'Happy', 'Brave'];
        $nouns = ['River', 'Mountain', 'Sky', 'Breeze', 'Ocean', 'Tree', 'Star'];
        $randomName = $adjectives[array_rand($adjectives)] . $nouns[array_rand($nouns)] . rand(10, 99);

        $user->updateQuietly([
            'anonymous_username' => $randomName
        ]);

        // 2. Dispatch job to get a better AI-generated name
        AssignAnonymousName::dispatch($user);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
