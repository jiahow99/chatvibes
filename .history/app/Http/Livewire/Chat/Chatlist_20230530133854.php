<?php

namespace App\Http\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatlist extends Component
{
    public $conversations;

    public function mount()
    {
        $this->conversations = Auth::user()->conversations();
        dd($this->conversations->first());
    }

    public function render()
    {
        return view('livewire.chat.chatlist');
    }
}
