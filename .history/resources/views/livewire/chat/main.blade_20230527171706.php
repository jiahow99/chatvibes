<div>
    <div class="chat_container col-9 row mx-auto outline">

        <div class="chat_list_container mt-5">
            @livewire('chat.chatlist')
        </div>

        <div class="chat_box_container">
            @livewire('chat.chatbox')
            @livewire('chat.send-message')
        </div>

    </div>
</div>
