<?php

namespace App\Http\Livewire\Chat;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Models\Conversation;

class Chatbox extends Component
{
    public $selected_conversation;
    public $selected_receiver;
    public $messages;
    
    protected $listeners = [
        'load_conversation',
        'push_message'
    ];


    /**
     * Conversation selected (listener)
     */
    public function load_conversation(Conversation $conversation, User $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->selected_receiver = $receiver;
        
        $this->messages = $this->format_messages(collect($conversation->messages)->sortBy('created_at')->toArray(), $conversation['sender_id'], $conversation['receiver_id']);
    }

    /**
     * Message sent (listener)
     */
    public function push_message(Message $message)
    {
        dd($this->messages);
    }

    
    public function back()
    {
        $this->selected_receiver = null ;
        $this->messages = null ;
    }


    private function format_messages(array $messages, string $sender_id, string $receiver_id)
    {
        // Format conversation
        $result_1 =  array_map(function ($message) use ($sender_id){
            $message['category'] = ($message['sender_id'] == $sender_id) ? 'send' : 'receive';

            $sent_time_exploded = explode(' ', Carbon::parse($message['created_at'])->diffForHumans());

            $time = $sent_time_exploded[0];

            $unit = $sent_time_exploded[1];
            
            $message['sent_time'] = $time . ' ' . $unit;

            return $message;
        }, $messages);

        // Only get conversations with the user
        $result_2 = array_filter($result_1, function ($message){
            return $message['sender_id'] == 1 || $message['receiver_id'] == 1;
        });

        return $result_2;
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
