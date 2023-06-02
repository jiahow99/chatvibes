<div class="h-full flex flex-col">
    @if ($selected_conversation && $selected_receiver)
        <!-- Header -->
        <div class="chatbox_header row m-0 p-0 py-2 bg-slate-300">
            <div class="back col-1 m-0 p-0 my-auto cursor-pointer" wire:click="back()">
                <i class="fa-solid fa-arrow-left-long text-2xl ml-4"></i>
            </div>
            <div class="col-10 col-lg-8 row mx-auto lg:m-0 p-0">
                <div class="col-6 row mx-auto m-lg-0">
                    <div class="col-6 col-lg-3 p-0 lg:mr-3">
                        <img src="https://ui-avatars.com/api/?rounded=true&name={{ $selected_receiver['name'] ?? '' }}" class="w-14 h-14 object-cover object-center rounded-full" alt="profile">
                    </div>
                    <div class="col-3 m-0 p-0 my-auto font-bold">
                        {{ $selected_receiver['name'] ?? "No user selected" }}
                    </div>
                </div>
            </div>
            <div class="col-2 hidden lg:flex ml-auto mr-3 p-0 space-x-5 justify-center items-center">
                <i class="fa-solid fa-phone-volume text-xl"></i>
                <i class="fa-regular fa-image text-xl"></i>
                <i class="fa-solid fa-circle-info text-xl"></i>
            </div>
        </div>

        <!-- Chatbox -->
        <div id="chatbox" class="chatbox_body flex-grow-1 h-24 px-2 pt-3 pb-14 space-y-6 overflow-y-auto">
            @if ($messages)
                @foreach ($messages as $message)
                    <div class="col-9 @if($message['category'] == 'receive') bg-slate-200 @else bg-blue-500 ml-auto text-white @endif  p-3 rounded-xl">
                        <div class="message w-fit break-all">
                            {{ $message['body'] }}
                        </div>
                        <div class="flex justify-between mt-2 text-black">
                            <div class="message-time font-bold">
                                {{ $message['sent_time'] }} ago
                            </div>
                            @if ($message['read'])
                                <div class="message-status space-x-2 @if($message['category'] == 'send') text-white @endif">
                                    <span>Seen</span>
                                    <span><i class="fa-solid fa-eye"></i></span>
                                </div>
                            @else
                                <div class="message-status space-x-2">
                                    <span>Sent</span>
                                    <span><i class="fa-solid fa-check"></i></span>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                @endforeach
            @else
                <div>No message</div>
            @endif
        </div>

        <!-- Send message -->
        <div class="chatbox_footer mt-auto relative border-t border-gray-400">
            {{-- <div class="col-3 absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-[120%] bg-slate-500/80 px-1 py-2 rounded-full text-center text-white">
                He is typing ...
            </div> --}}

            @livewire('chat.send-message')
        </div>
    @else
        <div class="w-full h-full flex justify-center items-center text-4xl font-bold text-gray-500">
            No conversation
        </div>
    @endif
</div>

<script>
    alert(document.querySelector('#chatbox'));
</script>
