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
    }

    private function format_conversations(Array $conversations)
    {
        return array_map(function ($conversation) {

            $conversation['receiver_name'] = User::find($conversation['receiver_id'])->name;

            $conversation['messages'] = collect($conversation['messages'])->sortByDesc('created_at')->toArray();

            $last_message = array_shift($conversation['messages']);

            $conversation['last_message'] = $last_message['body'];

            $diffInMinutes = Carbon::parse($last_message['created_at'])->diffInMinutes();
            $unit = '';

            switch (true) {
                case $diffInMinutes < 60:
                    $formattedDiff = $diffInMinutes;
                    $unit = 'm';
                    break;
                case $diffInMinutes < 1440:
                    $formattedDiff = floor($diffInMinutes / 60);
                    $unit = 'h';
                    break;
                case $diffInMinutes < 10080:
                    $formattedDiff = floor($diffInMinutes / 1440);
                    $unit = 'd';
                    break;
                case $diffInMinutes < 43829:
                    $formattedDiff = floor($diffInMinutes / 10080);
                    $unit = 'w';
                    break;
                case $diffInMinutes < 525949:
                    $formattedDiff = floor($diffInMinutes / 43829);
                    $unit = 'm';
                    break;
                default:
                    $formattedDiff = floor($diffInMinutes / 525949);
                    $unit = 'y';
            }

            $conversation['last_converse'] = 

            return $conversation;

        }, $conversations);
    }

    public function render()
    {
        return view('livewire.chat.chatlist');
    }
}
