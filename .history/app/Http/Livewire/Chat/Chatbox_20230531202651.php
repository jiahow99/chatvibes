<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\Conversation;

class Chatbox extends Component
{
    protected $listeners = [
        'load_conversation'
    ];


    public function load_conversation(Conversation $conversation, User $receiver)
    {

    }


    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
