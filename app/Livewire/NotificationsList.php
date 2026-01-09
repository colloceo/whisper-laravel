<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class NotificationsList extends Component
{
    use WithPagination;

    public function markAsRead($notificationId)
    {
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();
    }

    public function delete($notificationId)
    {
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $notification->delete();
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
    }

    public function clearAll()
    {
        Auth::user()->notifications()->delete();
    }

    public function render()
    {
        return view('livewire.notifications-list', [
            'notifications' => Auth::user()->notifications()->latest()->paginate(15)
        ]);
    }
}
