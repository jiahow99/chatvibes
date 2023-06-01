<div class="row col-12 mx-auto py-2 px-4">

    <form wire:submit.prevent="send_message" action="" class="flex">
        <input type="hidden" wire:model="conversation_id">
        <div class="col-9 m-0 p-0 my-auto">
            <input type="text" wire:model="body" name="body" id="body" placeholder="Type your message here ..." class="w-full bg-gray-300 border-0 rounded-xl">
        </div>

        <button type="submit" class="col-3 text-center my-auto cursor-pointer">
            <div class="w-fit px-4 py-2 text-lg bg-blue-400 rounded-full mx-auto flex space-x-2">
                <span><i class="fa-regular fa-paper-plane"></i></span>
                <span>Send</span>
            </div>
        </button>
    </form>

</div>