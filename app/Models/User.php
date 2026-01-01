<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * @property int $id
     * @property string|null $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property mixed $password
     * @property string|null $anonymous_username
     * @property bool $is_admin
     * @property \Illuminate\Support\Carbon|null $guidelines_accepted_at
     * @property \Illuminate\Support\Carbon|null $last_login_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'anonymous_username',
        'is_admin',
        'guidelines_accepted_at',
        'last_login_at',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function moodLogs()
    {
        return $this->hasMany(MoodLog::class);
    }

    public function journalEntries()
    {
        return $this->hasMany(JournalEntry::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
