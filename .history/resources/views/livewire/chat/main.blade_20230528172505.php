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
        <div class="row mt-5"  style="height: 70vh;">
          <!-- Chatlist (col-4) -->
          <div class="col-4 ">
            Chatlist
          </div>
      
          <!-- Chatbox (col-8) -->
          <div class="col-8">
            <div class="h-full d-flex flex-column bg-gray-300">
              <!-- Header -->
              <div class="py-3">
                Header
              </div>
      
              <!-- Chat Body -->
              <div class="flex-grow-1 p-2 overflow-auto bg-black">
                Chat body
              </div>
      
              <!-- Send Message -->
              <div class="p-2">
                Send message
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
