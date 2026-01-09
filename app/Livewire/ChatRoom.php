<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatRoom as ChatRoomModel;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\Layout;

class ChatRoom extends Component
{
    #[Layout('layouts.app')]
    public $activeRoom; // Changed from $room to handle the findOrFail
    public $newMessage;
    public $roomId;

    public function mount($id)
    {
        $this->roomId = $id;
        $this->activeRoom = ChatRoomModel::findOrFail($id);
    }

    public $replyingTo = null; // Stores the message being replied to
    public $showReportModal = false;
    public $reportMessageId = null;
    public $reportReason = '';

    public function sendMessage()
    {
        $this->validate(['newMessage' => 'required|string|max:1000']);

        $message = Message::create([
            'chat_room_id' => $this->roomId,
            'user_id' => Auth::id(),
            'content' => $this->newMessage,
            'parent_id' => $this->replyingTo ? $this->replyingTo->id : null,
        ]);

        // Notify parent message author if it's a reply
        if ($this->replyingTo && $this->replyingTo->user_id !== Auth::id()) {
            $this->replyingTo->user->notify(new \App\Notifications\NewReplyNotification($message));
        }

        $this->reset(['newMessage', 'replyingTo']);
        $this->dispatch('scroll-to-bottom');
    }

    public function replyTo($messageId)
    {
        $this->replyingTo = Message::find($messageId);
        $this->dispatch('focus-input');
    }

    public function cancelReply()
    {
        $this->reset('replyingTo');
    }

    public function promptReport($messageId)
    {
        $this->reportMessageId = $messageId;
        $this->showReportModal = true;
    }

    public function submitReport()
    {
        $this->validate([
            'reportReason' => 'required|string|min:3|max:255',
        ]);

        if ($this->reportMessageId) {
            \App\Models\MessageReport::create([
                'message_id' => $this->reportMessageId,
                'reporter_id' => Auth::id(),
                'reason' => $this->reportReason,
            ]);
        }

        $this->reset(['showReportModal', 'reportMessageId', 'reportReason']);
        $this->dispatch('report-submitted'); // Optional: for toast notification
    }

    public function closeReportModal()
    {
        $this->reset(['showReportModal', 'reportMessageId', 'reportReason']);
    }

    public function getMessagesProperty()
    {
        // Update current user's last seen
        Auth::user()->update(['last_seen_at' => now()]);

        return $this->activeRoom->messages()
            ->with(['user', 'parent.user'])
            ->latest()
            ->take(50)
            ->get()
            ->reverse();
    }

    public function getOnlineCountProperty()
    {
        return \App\Models\User::where('last_seen_at', '>=', now()->subMinutes(5))->count();
    }

    // Kept to maintain the sidebar functionality if needed, though user didn't explicitly ask for it in this specific prompt
    // but preserving it is safer for "Split View" context unless told to remove.
    // However, the prompt specifically asks for "The View" structure which implies a full page.
    // I will pass $room as $activeRoom to view to match strict variable usage if possible, but blade uses public props.

    public function render()
    {
        return view('livewire.chat-room', [
            'messages' => $this->messages,
            'room' => $this->activeRoom
        ]);
    }
}
