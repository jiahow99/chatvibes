<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\Conversation;

class Chatbox extends Component
{
    public $selected_conversation;
    public $selected_receiver;
    public $messages;
    
    protected $listeners = [
        'load_conversation'
    ];

    public function back()
    {
        $this->selected_receiver = null ;
        $this->messages = null ;
    }

    public function load_conversation(Conversation $conversation, User $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->selected_receiver = $receiver;

        $this->messages = collect($conversation->messages)->sortBy('created_at')->toArray();
    }

    private format_messages(Array $messages, string $sender_id, string $receiver_id)
    {
        return array_map(function($message){
            $message['category'] = '123';
        }, $messages);
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
