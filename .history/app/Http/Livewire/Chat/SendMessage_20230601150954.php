<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class SendMessage extends Component
{
    public $body;

    protected $listeners = [
        'update_send_message'
    ];

    public function send_message()
    {
        dd($this->body);
    }

    public function update_send_message()
    {
        dd($this->body);
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
