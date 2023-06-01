<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\Conversation;

class SendMessage extends Component
{
    public $body;

    protected $listeners  = [
        'update_send_message'
    ];

    public function send_message()
    {
        dd($this->body);
    }

    public function update_send_message(Conversation $conversation, User $receiver)
    {
        dd('123');
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
