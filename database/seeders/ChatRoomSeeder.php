<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChatRoom;

class ChatRoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'General Support',
                'description' => 'A safe place for everyone.',
                'icon' => 'chat-bubble'
            ],
            [
                'name' => 'Anxiety & Stress',
                'description' => 'Support for overwhelming moments.',
                'icon' => 'cloud'
            ],
            [
                'name' => 'Late Night Thoughts',
                'description' => 'For when you can\'t sleep.',
                'icon' => 'moon'
            ],
        ];

        foreach ($rooms as $room) {
            ChatRoom::firstOrCreate(
                ['name' => $room['name']], // Check by name
                $room // Create with all attributes
            );
        }
    }
}
