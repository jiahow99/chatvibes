<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\Conversation;

class SendMessage extends Component
{
    public $body;
    public $selected_conversation;
    public $receiver;

    protected $listeners = [
        'update_send_message'
    ];

    public function send_message()
    {
        dd($this->body);
    }

    public function update_send_message(Conversation $conversation, User $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiver = $receiver;
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
