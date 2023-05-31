<div>
    <div class="chat_container col-9 row mx-auto outline mt-5">

        <div class="chat_list_container ">
            @livewire('chat.chatlist')
        </div>

        <div class="chat_box_container">
            @livewire('chat.chatbox')
            @livewire('chat.send-message')
        </div>

    </div>
</div>
