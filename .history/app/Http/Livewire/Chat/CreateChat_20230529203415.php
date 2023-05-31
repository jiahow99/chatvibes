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
        $this->users = User::where('id', '!=', Auth::user->id)->get();

        dd($this->users);

        return view('livewire.chat.create-chat');
    }
}
