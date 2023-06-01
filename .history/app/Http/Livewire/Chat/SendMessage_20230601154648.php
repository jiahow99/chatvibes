<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class SendMessage extends Component
{
    public $body;
    public $selected_conversation;
    public $receiver;

    protected $listeners = [
        'update_send_message',
    ];

    /**
     * Conversation selected (listener)
     */
    public function update_send_message(Conversation $conversation, User $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiver = $receiver;
    }

    public function send_message()
    {
        // Return null if empty message
        if( $this->body == null )
        {
            return null;
        }
        
        // Create message
        $created_message = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiver->id,
            'body' => $this->body,
        ]);

        $this->selected_conversation->last_time_message = $created_message->created_at;
        $this->selected_conversation->save();
        
        $this->emitTo('chat.chatbox', 'push_message', $this->selected_conversation->id, $created_message->id);

        $this->reset('body');
    }


    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
