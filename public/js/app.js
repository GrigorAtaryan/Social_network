
$(document).on("click", ".friend_request", function(e){
    var friendId = e.target.id;
    var url ="/add_friend_request";
    $.ajax({
        url: url,
        type: "POST",
        data:{id:friendId}
    }).success(function(out){
        console.log(out);
    })


});

$(document).ready(function(){
    var url_show_msg = "/showMessages";

    var html = "<div  id='history'></div>";

    // Show Messages
    $('.message').on('click', function(){
        $.ajax({
            url: url_show_msg,
            type: "POST",
            data: {id: this.id},
            success: function(){
                console.log();
            }
        })

        html += "<input type='text' id='text' placeholder='New message' />";
        html += "<input  id='hidden' type='hidden' value='"+this.id+"'/>";
        html += "<br />";
        html += "<input type='submit' value='Send' id='send' class='btn btn-primary'/>";
        html += "<a id='close' href='#'>Close</a>";

        $('#div_msg').append(html).show('fast');
        $('#close').click(function(e){
            e.preventDefault();
            var html = '';
            $('#div_msg').html(html);


        })
    });

    $('body').delegate('#send', 'click', function(){

        var friend_id =  $("#hidden").val();
        var text = $("#text").val();
        var history = $('#history').val();
        var url  = "/write_message";
        $.ajax({
            type: "POST",
            url: url,
            data: {id: friend_id, msg_text: text},
            dataType: "json",
            success:function(){
                window.location.reload()
            }
        });


    });


})


