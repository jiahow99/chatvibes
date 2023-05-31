<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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
            $conversation['name'] = User::find($conversation['receiver_id']);
        }, $this->conversations);
    }

    public function render()
    {
        return view('livewire.chat.chatlist', [
            'conversations' => $this->conversations(),
        ]);
    }
}
