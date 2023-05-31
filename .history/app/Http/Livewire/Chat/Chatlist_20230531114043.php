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
        return array_map(function ($conversation) {
            $conversation['messages'] = collect($conversation['messages'])->sortByDesc('created_at')->toArray();

            $conversation['last_message'] = $conversation['messages']->first();

            return $conversation;
        }, $this->conversations);
    }

    public function render()
    {
        // return view('livewire.chat.chatlist', [
        //     'conversations' => $this->conversations(),
        // ]);
        dd($this->conversations());
    }
}
