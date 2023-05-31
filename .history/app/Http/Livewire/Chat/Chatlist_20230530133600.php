<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class Chatlist extends Component
{
    public $conversations;
    public $auth_id;

    
    public function render()
    {
        return view('livewire.chat.chatlist');
    }
}
