<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'mood_score',
        'ai_response',
        'is_private'
    ];

    protected $casts = [
        'is_private' => 'boolean',
        'mood_score' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
