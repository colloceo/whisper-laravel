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

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'anonymous_username' => 'required|string|max:255|unique:users,anonymous_username,' . $user->id,
            'name' => 'nullable|string|max:255',
            'daily_reminders' => 'nullable|boolean',
            'crisis_alerts' => 'nullable|boolean',
            'anonymous_mode' => 'nullable|boolean',
        ]);

        // Handle checkboxes (if not present in request, set to false)
        $data = $validated;
        $data['daily_reminders'] = $request->has('daily_reminders');
        $data['crisis_alerts'] = $request->has('crisis_alerts');
        $data['anonymous_mode'] = $request->has('anonymous_mode');

        $user->update($data);

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        if ($user->delete()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('status', 'Your account has been deleted.');
        }

        return redirect()->back()->with('error', 'Account could not be deleted.');
    }
}
