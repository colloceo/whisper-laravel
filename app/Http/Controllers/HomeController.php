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

        $moodLogs = $user->moodLogs()
            ->latest()
            ->take(7)
            ->get()
            ->reverse()
            ->values();

        // Get daily affirmation (Cache for 24 hours per user)
        $affirmation = Cache::remember("affirmation_{$user->id}_" . now()->format('Y-m-d'), 60 * 24, function () use ($aiService, $moodLogs) {
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
}
