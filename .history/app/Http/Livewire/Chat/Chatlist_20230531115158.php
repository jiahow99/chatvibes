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

    public function format_conversations()
    {
        return array_map(function ($conversation) {

            $conversation['receiver_name'] = User::find($conversation['receiver_id'])->name;

            $conversation['messages'] = collect($conversation['messages'])->sortByDesc('created_at')->toArray();

            $conversation['last_message'] = array_shift($conversation['messages'])['body'];

            return $conversation;

        }, $this->conversations);
    }

    public function render()
    {
        return view('livewire.chat.chatlist', [
            'format_conversations' => $this->format_conversations(),
        ]);
        // dd($this->conversations());
    }
}
