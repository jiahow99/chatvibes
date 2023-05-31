<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class CreateChat extends Component
{
    public $users;

    public function render()
    {
        // Get all users (except logged in one)
        $this->users = User::where('id', '!=', Auth::user()->id)->get();

        return view('livewire.chat.create-chat');
    }

    public function has_conversation( string $user_id )
    {
        // Get "clicked" user & "logged" user
        $user = User::find($user_id);
        $logged_user = Auth::user();

        // Create conversation if not have one
        if( !$user->conversation_established() )
        {
            $created_conversation = Conversation::create([
                'sender_id' => Auth::user()->id,
                'receiver_id' => $user_id,
            ]);

            $created_message = $created_conversation->messages()->create();

            $created_conversation->last_time_message = $created_message->created_at;
            $created_conversation->save();

        }
        else{
            dd($logged_user->conversation_with($user_id)->messages()->first(0));
        }

       
    }
}
