<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class Chatlist extends Component
{
    public $conversations;

    public function mount()
    {
        $this->conversations = $this->format_conversations(Auth::user()->conversations()->with('messages')->get()->toArray());
        // $this->conversations = Auth::user()->conversations()->with('messages')->get()->toArray();
    }

    private function format_conversations(Array $conversations)
    {
        return array_map(function ($conversation) {

            $conversation['receiver_name'] = User::find($conversation['receiver_id'])->name;

            $conversation['messages'] = collect($conversation['messages'])->sortByDesc('created_at')->toArray();

            $conversation['last_message'] = $conversation['messages'][0];

            $conversation['last_converse'] = Carbon::parse($conversation['last_time_message'])->shortAbsoluteDiffForHumans();

            return $conversation;

        }, $conversations);
    }

    public function render()
    {
        return view('livewire.chat.chatlist');
        // dd($this->conversations);
    }
}
