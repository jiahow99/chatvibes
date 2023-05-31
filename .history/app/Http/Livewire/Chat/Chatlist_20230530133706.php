<?php

namespace App\Http\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatlist extends Component
{
    public $conversations;
    public $logged_user;

    public function mount()
    {
        $this->logged_user = Auth::user();
        $this->conversations = $logged_user->conversations();
    }

    public function render()
    {
        return view('livewire.chat.chatlist');
    }
}
