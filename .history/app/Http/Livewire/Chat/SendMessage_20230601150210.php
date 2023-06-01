<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class SendMessage extends Component
{
    public $body;

    public function send_message()
    {
        dd('Send');
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
