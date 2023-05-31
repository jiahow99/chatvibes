<?php

namespace App\Http\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatlist extends Component
{
    public $conversations;
    public $auth_id;

    public function mount()
    {
        $this->auth_id = Auth::id();
    }

    public function render()
    {
        return view('livewire.chat.chatlist');
    }
}
