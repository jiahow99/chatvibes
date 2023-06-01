<?php

namespace App\Http\Livewire\Chat;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;


class Chatlist extends Component
{
    public $conversations;
    public $user;
    public $selected_conversation;

    protected $listeners = [
        'conversation_selected'
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->conversations = $this->format_conversations(Auth::user()->conversations()->with('messages')->get()->toArray());
        // $this->conversations = Auth::user()->conversations()->with('messages')->get()->toArray();
    }
    
    public function get_user_avatar(User $user)
    {
        return $user->name;
    }

    public function conversation_selected(Conversation $conversation, string $receiver_id)
    {
        $this->emitTo('chat.chatbox', 'load_conversation', $conversation, $receiver_id);

        $this->emitTo('chat.sendmessage', 'update_send_message', $conversation, $receiver_id>);
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
    }
}
