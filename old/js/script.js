$(function() {
    $(".heading-compose").click(function() {
        $(".side-two").css({
            "left": "0"
        });
    });

    $(".newMessage-back").click(function() {
        $(".side-two").css({
            "left": "-100%"
        });
    });
})

$(document).ready(function() {

    setInterval(()=>{
        console.log('TIMER');
        $.ajax({
            type: "GET",
            url: "http://localhost:82/chat-app-2/php/chat.php",
            success: function(response) {
                $('.conversation').html(response)
            }
        });
    }, 1000);

});