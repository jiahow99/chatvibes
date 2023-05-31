<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class CreateChat extends Component
{
    public $users;

    public function render()
    {
        return view('livewire.chat.create-chat');
    }
}
