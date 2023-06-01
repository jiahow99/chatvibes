<div class="flex flex-col h-full">
    <div class="chatlist_header py-2 pl-4 pr-2 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Chat</h2>
        <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&rounded=true&name={{ $user['name'] }}" class="w-14 h-14" alt="profile">
    </div>


    <div class="chatlist_body grow h-40 overflow-y-auto">
        @if ( !empty($conversations) )
            @foreach ($conversations as $conversation)
                <div class="chat row m-0 pt-2 px-3" wire:click="$emit('conversation_selected', {{ $conversation['id'] }}, {{ $conversation['receiver_id'] }})">
                    <div class="col-12 row py-2 bg-slate-400 hover:bg-slate-500 mx-auto rounded-xl cursor-pointer">
                        <div class="col-2 m-0 p-0">
                            <img src="https://ui-avatars.com/api/?rounded=true&name={{ $conversation['receiver_name'] }}" class="w-14 h-14" alt="profile">
                        </div>
                        <div class="col-7">
                            <div>{{ $conversation['receiver_name'] }}</div>
                            <div class="truncate text-slate-500">{{ $conversation['last_message']['body'] }}</div>
                        </div>
                        <div class="col-3 text-center">
                            <div>{{ $conversation['last_converse'] }}</div>
                            <div><span class="px-2 py-1 rounded-full bg-slate-600 text-white text-xs">12</span></div>
                        </div>
                    </div>  
                </div>
            @endforeach
        @else
            <div class="chat row m-0 pt-2 px-3">No conversations</div>
        @endif
    </div>
</div>
