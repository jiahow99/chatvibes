<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class Chatlist extends Component
{
    public $conversations;
    
    public function render()
    {
        return view('livewire.chat.chatlist');
    }
}
