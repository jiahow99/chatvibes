<?php

namespace App\Http\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatlist extends Component
{
    public $conversations;

    public function mount()
    {
        $this->conversations = Auth::user()->conversations;
    }

    public function conversations()
    {
        return collect($this->conversations)->toJson()->dump();
    }

    public function render()
    {
        return view('livewire.chat.chatlist', [
            'conversations' => $this->conversations(),
        ]);
    }
}
