<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        // Calculate stats
        $daysActive = 0;
        if ($user->created_at) {
            $daysActive = (int) $user->created_at->diffInDays(now());
        }

        $journalCount = $user->journalEntries()->count();
        $moodCheckins = $user->moodLogs()->count();
        $savedInsights = $user->journalEntries()->whereNotNull('ai_response')->count();

        return view('profile', compact('user', 'daysActive', 'journalCount', 'moodCheckins', 'savedInsights'));
    }
}
