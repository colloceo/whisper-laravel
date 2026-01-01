<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'active_today' => User::whereDate('last_login_at', today())->count(),
            'total_mood_logs' => \App\Models\MoodLog::count(),
            'total_journal_entries' => \App\Models\JournalEntry::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users', compact('users'));
    }

    public function toggleAdmin(User $user)
    {
        // Prevent self-demotion if you are the only admin (optional safety, skipping for MVP)
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot change your own admin status.');
        }

        $user->save();

        $status = $user->is_admin ? 'promoted to Admin' : 'demoted from Admin';
        return back()->with('status', "User {$user->name} has been {$status}.");
    }

    // --- Chat Room Management ---
    public function chatRooms()
    {
        $rooms = \App\Models\ChatRoom::withCount('messages')->get();
        return view('admin.chat_rooms', compact('rooms'));
    }

    public function deleteChatRoom(\App\Models\ChatRoom $room)
    {
        $room->delete();
        return back()->with('status', 'Chat room deleted successfully.');
    }

    public function storeChatRoom(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        \App\Models\ChatRoom::create($validated);
        return back()->with('status', 'Chat room created successfully.');
    }

    public function editChatRoom(\App\Models\ChatRoom $room)
    {
        return view('admin.chat_rooms.edit', compact('room'));
    }

    public function updateChatRoom(Request $request, \App\Models\ChatRoom $room)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $room->update($validated);
        return redirect()->route('admin.chat_rooms')->with('status', 'Chat room updated successfully.');
    }

    // --- Crisis Resource Management ---
    public function resources()
    {
        $resources = \App\Models\CrisisResource::all();
        return view('admin.resources', compact('resources'));
    }

    public function storeResource(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:hotline,website,organization',
            'phone' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
        ]);

        \App\Models\CrisisResource::create($validated);
        return back()->with('status', 'Resource added successfully.');
    }

    public function editResource(\App\Models\CrisisResource $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    public function updateResource(Request $request, \App\Models\CrisisResource $resource)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:hotline,website,organization',
            'phone' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
        ]);

        $resource->update($validated);
        return redirect()->route('admin.resources')->with('status', 'Resource updated successfully.');
    }

    public function deleteResource(\App\Models\CrisisResource $resource)
    {
        $resource->delete();
        return back()->with('status', 'Resource deleted successfully.');
    }

    public function deleteUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return back()->with('status', 'User deleted successfully.');
    }

    // --- Message Reporting Management ---
    public function reports()
    {
        $reports = \App\Models\MessageReport::with(['message.user', 'reporter'])->latest()->paginate(20);
        return view('admin.reports', compact('reports'));
    }

    public function dismissReport($id)
    {
        $report = \App\Models\MessageReport::findOrFail($id);
        $report->update(['status' => 'dismissed']);
        return back()->with('status', 'Report dismissed.');
    }

    public function deleteReportedMessage($id)
    {
        $report = \App\Models\MessageReport::findOrFail($id);
        if ($report->message) {
            $report->message->delete();
        }
        $report->update(['status' => 'resolved']);
        return back()->with('status', 'Message deleted and report resolved.');
    }
}
