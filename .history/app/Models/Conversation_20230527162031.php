<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}