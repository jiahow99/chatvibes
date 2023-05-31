<?php

namespace App\Http\Livewire\Chat;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
        $result_1 = Conversation::where('sender_id', $auth_user_id)
                    ->where('receiver_id', $user_id);

        $result_2 = Conversation::where('receiver_id', $auth_user_id)
                    ->where('sender_id', $user_id);

        dd(!is_null($result_1) == !is_null($result_2));
    }
}
