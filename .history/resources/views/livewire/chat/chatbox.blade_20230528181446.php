<div class="h-full flex flex-col  ">
    <!-- Header -->
    <div class="chatbox_header row m-0 p-0 py-2 bg-slate-300">
        <div class="col-1 m-0 p-0 my-auto">
            <i class="fa-solid fa-arrow-left-long text-2xl ml-4"></i>
        </div>
        <div class="col-8 row m-0 p-0">
            <div class="col-2 m-0 p-0 text-center">
                <img src="{{ asset('img/profile-2.jpg') }}" class="w-14 h-14 object-cover object-center rounded-full" alt="profile">
            </div>
            <div class="col m-0 p-0 my-auto font-bold text-center">John</div>
        </div>
        <div class="col-2 flex ml-auto mr-3 p-0 space-x-5 justify-center items-center">
            <i class="fa-solid fa-phone-volume text-xl"></i>
            <i class="fa-regular fa-image text-xl"></i>
            <i class="fa-solid fa-circle-info text-xl"></i>
        </div>
    </div>

    <!-- Chatbox -->
    <div class="chatbox_body flex-grow-1 h-24 px-2 pt-3 pb-14 space-y-6 overflow-y-auto">
        <div class="col-9 bg-blue-500 text-white p-3 rounded-xl">
            <div class="message w-fit break-all">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias voluptatum sapiente expedita pariatur! Nisi cupiditate vitae sunt quibusdam minima necessitatibus tenetur, asperiores magnam dolore? Nihil porro fuga accusantium modi voluptatibus.
            </div>
            <div class="flex justify-between mt-2 text-black">
                <div class="message-time font-bold">
                    3 hours ago
                </div>
                <div class="message-status space-x-2">
                    <span>Seen</span>
                    <span><i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
        </div>

        <div class="col-9 bg-slate-200 ml-auto p-3 rounded-xl">
            <div class="w-fit break-all ml-auto">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias voluptatum sapiente expedita pariatur! Nisi cupiditate vitae sunt quibusdam minima necessitatibus tenetur, asperiores magnam dolore? Nihil porro fuga accusantium modi voluptatibus.
            </div>
            <div class="flex justify-between mt-2">
                <div class="message-time font-bold">
                    2 mins ago
                </div>
                <div class="message-status space-x-2">
                    <span>Sent</span>
                    <span><i class="fa-solid fa-check"></i></span>
                </div>
            </div>
        </div>

        <div class="col-9 bg-slate-200 ml-auto p-3 rounded-xl">
            <div class="w-fit break-all ml-auto">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias voluptatum sapiente expedita pariatur! Nisi cupiditate vitae sunt quibusdam minima necessitatibus tenetur, asperiores magnam dolore? Nihil porro fuga accusantium modi voluptatibus.
            </div>
            <div class="flex justify-between mt-2">
                <div class="message-time font-bold">
                    2 mins ago
                </div>
                <div class="message-status space-x-2">
                    <span>Sent</span>
                    <span><i class="fa-solid fa-check"></i></span>
                </div>
            </div>
        </div>

        
    </div>

    <!-- Send message -->
    <div class="chatbox_footer mt-auto relative border-t border-gray-400">
        {{-- <div class="col-3 absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-[120%] bg-slate-500/80 px-1 py-2 rounded-full text-center text-white">
            He is typing ...
        </div> --}}

        @livewire('chat.send-message')
    </div>
</div>
