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
        $this->conversations = Auth::user()->conversations()->with('messages')->get()->toArray();
    }

    public function conversations()
    {
        return collect(array_map(function ($conversation) {

            $conversation['receiver_name'] = User::find( $conversation['receiver_id'] );

            $conversation['messages'] = collect($conversation['messages'])->sortByDesc('created_at')->toArray();

            $conversation['last_message'] = array_shift($conversation['messages']);

            return $conversation;

        }, $this->conversations))->dump();
    }

    public function render()
    {
        return view('livewire.chat.chatlist', [
            'conversations' => $this->conversations(),
        ]);
        // dd($this->conversations());
    }
}
