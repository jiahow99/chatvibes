<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class Chatbox extends Component
{
    protected $listeners = [
        'load_conversation'
    ];
    
    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
