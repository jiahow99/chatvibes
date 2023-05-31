<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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


    /**
     * Return covnersation with a specific user
     */
    public function conversation_with(string $user_id)
    {
        $logged_user_id = Auth::user()->id;

        return Conversation::where('sender_id', $logged_user_id)
                ->where('receiver_id', $user_id)
                ->first()
                ->id ?? null;
    }


    /**
     * Check if a conversation has been established with the "clicked" user
     */
    public function conversation_established()
    {
        $auth_id = Auth::user()->id;

        $result_1 = Conversation::where('sender_id', $auth_id)
                    ->where('receiver_id', $this->id)
                    ->first();

        $result_2 = Conversation::where('receiver_id', $auth_id)
                    ->where('sender_id', $this->id)
                    ->first();

        return (!is_null($result_1) or  !is_null($result_2));
    }
}
