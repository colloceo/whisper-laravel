<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\AiService;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    // ... constructor ...

    public function index(AiService $aiService)
    {
        $user = auth()->user();

        // Generate the current week (Sunday to Saturday)
        $startOfWeek = now()->startOfWeek(0); // 0 = Sunday
        $days = collect(range(0, 6))->map(function ($i) use ($startOfWeek) {
            return $startOfWeek->copy()->addDays($i)->format('Y-m-d');
        });

        // Get mood logs for the last 14 days (wider window to ensure we catch recent but not immediate logs)
        $rawMoodLogs = $user->moodLogs()
            ->where('created_at', '>=', now()->subDays(14))
            ->get()
            ->groupBy(function ($log) {
                return $log->created_at->format('Y-m-d');
            });

        // Map each of the 7 days to its average mood score (or null)
        $moodLogs = $days->map(function ($date) use ($rawMoodLogs) {
            $dayLogs = $rawMoodLogs->get($date);
            return [
                'date' => $date,
                'mood_score' => $dayLogs ? round($dayLogs->avg('mood_score'), 1) : null,
                'count' => $dayLogs ? $dayLogs->count() : 0,
            ];
        });

        // Get daily affirmation (Cache for 24 hours per user)
        $affirmation = Cache::remember("affirmation_{$user->id}_" . now()->format('Y-m-d'), 60 * 24, function () use ($aiService, $moodLogs) {
            // Calculate overall average from the aggregated daily averages or raw logs
            $avgMood = $moodLogs->avg('mood_score') ?? 3;
            return $aiService->getDailyAffirmation(round($avgMood, 1));
        });

        return view('home', compact('moodLogs', 'affirmation'));
    }

    public function storeMood(Request $request)
    {
        $request->validate([
            'mood_score' => 'required|integer|min:1|max:5',
            'note' => 'nullable|string|max:255',
        ]);

        auth()->user()->moodLogs()->create($request->only('mood_score', 'note'));

        return redirect()->back()->with('status', 'Mood logged successfully!');
    }

    public function updateDailyMood(Request $request)
    {
        $request->validate([
            'date' => 'required|date', // Y-m-d
            'mood_score' => 'required|integer|min:1|max:5',
        ]);

        $user = auth()->user();
        $date = \Carbon\Carbon::parse($request->date)->format('Y-m-d');

        // Delete existing logs for this date
        $user->moodLogs()
            ->whereDate('created_at', $date)
            ->delete();

        // Create new log for this date (set time to 12:00 PM to be safe)
        $user->moodLogs()->forceCreate([
            'user_id' => $user->id,
            'mood_score' => (int) $request->mood_score,
            'note' => 'Manual update via graph',
            'created_at' => \Carbon\Carbon::parse($date)->setHour(12)->setMinute(0)->setSecond(0)
        ]);

        return redirect()->back()->with('status', "Daily mood for $date updated successfully!");
    }
}
