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

    public function has_conversation( string $user_id )
    {
        // Check if user had conversation before
        User::find($user_id)->conversation_established();

       
    }
}
