<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Livewire\Component;
use App\Models\Conversation;
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

    public function is_conversation_established( string $user_id )
    {
        $result_1 = Conversation::where('sender_id', 2)
                    ->where('receiver_id', 3)
                    ->first();
                    ->id;

        // $result_2 = Conversation::where('receiver_id', Auth::user()->id)
        //             ->where('sender_id', $user_id);

        dd($result_1);
    }
}
