<div>
    {{-- <div class="chat_container col-9 row mx-auto mt-5 h-[550px]">
        <div class="chat_list_container col-4 m-0 p-0">
            @livewire('chat.chatlist')
        </div>

        <div class="chat_box_container col-8 m-0 p-0 ">
            @livewire('chat.chatbox')
        </div>

    </div> --}}

    <div class="container-fluid">
        <div class="row mt-5" style="height: 80vh;">
            <!-- Chatlist (col-4) -->
            <div class="col-4">
                Chatlist
            </div>
    
            <!-- Chatbox (col-8) -->
            <div class="col-8 d-flex flex-column">
                <div class="h-100 d-flex flex-column bg-gray-300">
                    <!-- Header -->
                    <div class="py-3">
                        Header
                    </div>
    
                    <!-- Chat Body -->
                    <div class=" h-24 overflow-y-auto bg-black">
                        <div class="p-5 bg-slate-400">123</div>
                        <div class="p-5 bg-slate-500">123</div>
                        <div class="p-5 bg-slate-600">123</div>
                        <div class="p-5 bg-slate-700">123</div>
                        <div class="p-5 bg-slate-800">123</div>
                        <div class="p-5 bg-slate-900">123</div>
                        <div class="p-5 bg-slate-400">123</div>
                    </div>
    
                    <!-- Send Message -->
                    <div class="p-3">
                        Send message
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
