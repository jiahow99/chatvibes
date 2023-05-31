<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    use HasFactory;

    protected $fillables = [
        'sender_id',
        'receiver_id',
        'last_time_message',
    ];

    // Relationships
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function established(string $user_id)
    {
        $user = User::find( $user_id );

        dd($user->conversation_established());

        $result_1 = Conversation::where('sender_id', $auth_user_id)
                    ->where('receiver_id', $user_id);

        $result_2 = Conversation::where('receiver_id', $auth_user_id)
                    ->where('sender_id', $user_id);

        return !is_null($result_1) == !is_null($result_2);
    }
}
