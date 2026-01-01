<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatRoom as ChatRoomModel;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatRoom extends Component
{
    public $activeRoom; // Changed from $room to handle the findOrFail
    public $newMessage;
    public $roomId;

    public function mount($id)
    {
        $this->roomId = $id;
        $this->activeRoom = ChatRoomModel::findOrFail($id);
    }

    public function sendMessage()
    {
        $this->validate(['newMessage' => 'required|string|max:1000']);

        Message::create([
            'chat_room_id' => $this->roomId,
            'user_id' => Auth::id(),
            'content' => $this->newMessage
        ]);

        $this->reset('newMessage');
        $this->dispatch('scroll-to-bottom');
    }

    public function getMessagesProperty()
    {
        return $this->activeRoom->messages()
            ->with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();
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
        ])->extends('layouts.app')->section('content');
    }
}
