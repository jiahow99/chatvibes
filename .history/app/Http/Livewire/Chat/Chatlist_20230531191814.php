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
        // $this->conversations = Auth::user()->conversations()->with('messages')->get()->toArray();
    }

    private function format_conversations(Array $conversations)
    {
        return array_map(function ($conversation) {

            $conversation['receiver_name'] = User::find($conversation['receiver_id'])->name;

            $conversation['messages'] = collect($conversation['messages'])->sortByDesc('created_at')->toArray();

            $last_message = $conversation['messages'][0];

            $conversation['last_message'] = $last_message;

            // $now = Carbon::now('UTC')->format('Y m d h m s');
            // dd($now);
            $diffInMinutes = Carbon::parse($last_message['created_at'])->diffInMinutes();
            // $unit = '';

            // switch (true) {
            //     case $diffInMinutes < 60:
            //         $result = $diffInMinutes;
            //         $unit = 'm';
            //         break;
            //     case $diffInMinutes < 1440:
            //         $result = floor($diffInMinutes / 60);
            //         $unit = 'h';
            //         break;
            //     case $diffInMinutes < 10080:
            //         $result = floor($diffInMinutes / 1440);
            //         $unit = 'd';
            //         break;
            //     case $diffInMinutes < 43829:
            //         $result = floor($diffInMinutes / 10080);
            //         $unit = 'w';
            //         break;
            //     case $diffInMinutes < 525949:
            //         $result = floor($diffInMinutes / 43829);
            //         $unit = 'm';
            //         break;
            //     default:
            //         $result = floor($diffInMinutes / 525949);
            //         $unit = 'y';
            // }
            // // dd($result . $unit);
            // $conversation['last_converse'] = $result . $unit;

            return $conversation;

        }, $conversations);
    }

    public function render()
    {
        // return view('livewire.chat.chatlist');
        dd($this->conversations);
    }
}
