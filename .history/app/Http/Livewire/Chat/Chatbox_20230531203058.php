<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\Conversation;

class Chatbox extends Component
{
    public $selected_conversation;
    public $selected_reciver;
    
    protected $listeners = [
        'load_conversation'
    ];


    public function load_conversation(Conversation $conversation, User $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->selected_receiver = $receiver;
    }


    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
