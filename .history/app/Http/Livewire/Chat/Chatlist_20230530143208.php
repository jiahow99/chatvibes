<?php

namespace App\Http\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chatlist extends Component
{
    public $conversations;

    public function mount()
    {
        $this->conversations = Auth::user()->conversations->toArray();
        dd($this->conversations);
    }

    public function conversations()
    {
        return array_map(function( $conversation ){
            $conversation['']
        }, $this->conversations);
    }

    public function render()
    {
        return view('livewire.chat.chatlist', [
            'conversations' => $this->conversations(),
        ]);
    }
}
