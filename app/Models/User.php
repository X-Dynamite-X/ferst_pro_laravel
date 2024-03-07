<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\subject;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_actev',
        'is_admin',
        "image",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_user')->withPivot('user_mark');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public function sentChatusers()
    {
        return $this->hasMany(Chatuser::class, 'sender_user_id');
    }

    public function receivedChatusers()
    {
        return $this->hasMany(Chatuser::class, 'receiver_user_id');
    }


}
