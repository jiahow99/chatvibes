<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="chat_container">
        <div class="chat_list_container">
            @livewire('chat.chatlist')
        </div>
    </div>
</div>
