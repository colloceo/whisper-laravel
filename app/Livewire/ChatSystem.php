<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ChatRoom;

class ChatSystem extends Component
{
    public $rooms;

    public function mount()
    {
        $this->rooms = ChatRoom::where('is_active', true)->get();
    }

    public function render()
    {
        return view('livewire.chat-system');
    }
}
