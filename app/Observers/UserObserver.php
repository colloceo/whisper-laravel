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
        // Inline generation to ensure immediate availability
        $adjectives = ['Calm', 'Serene', 'Gentle', 'Quiet', 'Peaceful', 'Happy', 'Brave', 'Kind', 'Wise', 'Warm'];
        $nouns = ['River', 'Mountain', 'Sky', 'Breeze', 'Ocean', 'Tree', 'Star', 'Moon', 'Sun', 'Cloud'];

        $randomName = $adjectives[array_rand($adjectives)] . $nouns[array_rand($nouns)] . rand(10, 99);

        $user->updateQuietly([
            'anonymous_username' => $randomName
        ]);
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
