<div>
    <div class="chat_container col-9 row mx-auto mt-5 min-h-[80vh] bg-[#19A7CE] bg-opacity-40">

        <div class="chat_list_container col-4 m-0 p-0">
            @livewire('chat.chatlist')
        </div>

        <div class="chat_box_container col-8 m-0 p-0 flex flex-col justify-between ">
            @livewire('chat.chatbox')
            @livewire('chat.send-message')
        </div>

    </div>
</div>
