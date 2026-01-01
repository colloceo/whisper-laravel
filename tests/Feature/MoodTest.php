<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\MoodLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MoodTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_daily_mood_replaces_existing_logs()
    {
        $user = User::factory()->create();
        $date = '2025-01-01';

        // Create initial logs
        MoodLog::forceCreate(['user_id' => $user->id, 'mood_score' => 2, 'created_at' => $date . ' 09:00:00']);
        MoodLog::forceCreate(['user_id' => $user->id, 'mood_score' => 4, 'created_at' => $date . ' 15:00:00']);

        $this->assertEquals(2, $user->moodLogs()->count());

        // Act: Update daily mood to 5
        $response = $this->actingAs($user)
            ->post(route('mood.update_daily'), [
                'date' => $date,
                'mood_score' => 5
            ]);

        // Assert
        $response->assertRedirect();
        $this->assertEquals(1, $user->moodLogs()->count());
        $this->assertEquals(5, $user->moodLogs()->first()->mood_score);
        $this->assertEquals($date . ' 12:00:00', $user->moodLogs()->first()->created_at->format('Y-m-d H:i:s'));
    }

    public function test_home_page_shows_aggregated_mood()
    {
        $user = User::factory()->create();
        $date = now()->format('Y-m-d');

        // Create logs averaging to 3
        MoodLog::forceCreate(['user_id' => $user->id, 'mood_score' => 2, 'created_at' => now()->startOfDay()->addHours(9)]);
        MoodLog::forceCreate(['user_id' => $user->id, 'mood_score' => 4, 'created_at' => now()->startOfDay()->addHours(15)]);

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertStatus(200);

        // Check if the view receives the correct data
        $moodLogs = $response->viewData('moodLogs'); // Collection
        $todayLog = $moodLogs->first(); // Should be the only one or last one depending on sort

        // Our controller logic groups by date, and map returns array.
        // It returns values().
        // format is Y-m-d.

        $this->assertEquals(3.0, $todayLog['mood_score']);
    }
}
