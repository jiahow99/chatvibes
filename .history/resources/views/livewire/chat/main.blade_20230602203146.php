<div>

    <div class="chat_container col-11 col-lg-9 row mx-auto mt-5 h-[80vh]">
        <div class="chat_list_container col-4 m-0 p-0">
            @livewire('chat.chatlist')
        </div>

        <div class="chat_box_container col-8 m-0 p-0">
            @livewire('chat.chatbox')
        </div>

    </div>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        alert(document.querySelector('.chatbox_body'));
        $(document).ready(function(){


            // Hide chatlist and show chatbox (Mobile)
            if ($(window).width() <= 767) {
                $('.chat').click(function(){
                    // Chatlist slide left (hide)
                    $('.chat_list_container').hide();
                    // Chatbox show full width
                    $('.chat_box_container').removeClass('col-8');
                    $('.chat_box_container').addClass('col-12');
    
                    $('.back').click(function(){
                        $('.chat_list_container').show();
                        $('.chat_box_container').removeClass('col-12');
                        $('.chat_box_container').addClass('col-8');
                    });
                });
            }

        }); 
    </script>

</div>
