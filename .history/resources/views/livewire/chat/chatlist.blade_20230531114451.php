<div class="flex flex-col h-full">
    <div class="chatlist_header py-2 pl-4 pr-2 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Chat</h2>
        <img src="{{ asset('img/profile-1.jpeg') }}" class="w-14 h-14 object-cover object-center rounded-full" alt="profile">
    </div>


    <div class="chatlist_body grow h-40 overflow-y-auto">
        @foreach ($conversations as $conversation)
            <div class="chat row m-0 pt-2 px-3">
                <div class="col-12 row py-2 bg-slate-400 hover:bg-slate-500 mx-auto rounded-xl cursor-pointer">
                    <div class="col-2 m-0 p-0">
                        <img src="{{ asset('img/profile-2.jpg') }}" class="w-14 h-14 object-cover object-center rounded-full" alt="profile">
                    </div>
                    <div class="col-7">
                        <div>{{ $conversation['receiver_name'] }}</div>
                        <div class="truncate text-slate-500">Contentasdasdasdsadasdsadasjkasjkdj</div>
                    </div>
                    <div class="col-3 text-center">
                        <div>2d</div>
                        <div><span class="px-2 py-1 rounded-full bg-slate-600 text-white text-xs">12</span></div>
                    </div>
                </div>  
            </div>
        @endforeach
    </div>
</div>
