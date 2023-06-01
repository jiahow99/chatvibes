<?php

namespace App\Http\Livewire\Chat;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;


class Chatlist extends Component
{
    public $conversations;
    public $user;
    public $selected_conversation;

    protected $listeners = [
        'conversation_selected',
        'push_message',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->conversations = $this->format_conversations(Auth::user()->conversations()->with('messages')->get()->toArray());
    }


    /**
     * Message sent (listener)
     */
    public function push_message(Conversation $conversation, Message $message)
    {
        $this->conversations = $this->format_conversations(Auth::user()->conversations()->with('messages')->get()->toArray());
    }


    /**
     * Conversation selected (listener)
     */
    public function conversation_selected(Conversation $conversation, string $receiver_id)
    {
        $this->emitTo('chat.chatbox', 'load_conversation', $conversation, $receiver_id);

        $this->emitTo('chat.send-message', 'update_send_message', $conversation, $receiver_id);
    }


    private function format_conversations(Array $conversations)
    {
        dd(array_map(function ($conversation) {

            $conversation['receiver_name'] = User::find($conversation['receiver_id'])->name;

            $conversation['messages'] = collect($conversation['messages'])->sortByDesc('created_at')->toArray();

            $conversation['last_message'] = $conversation['messages'][0];

            $conversation['last_converse'] = Carbon::parse($conversation['last_time_message'])->shortAbsoluteDiffForHumans();

            return $conversation;

        }, $conversations));
    }


    public function render()
    {
        return view('livewire.chat.chatlist');
    }
}
