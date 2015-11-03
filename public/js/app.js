
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
    // Show Messages

    var url_show_msg = "/show_messages";
    $('.message').on('click', function(){
        $.ajax({
            url: url_show_msg,
            type: "POST",
            data: {id: this.id},
            success: function(out){

                message_view(out);

            }
        })
        var html = "<div  id='history'></div>";
        html += "<input type='text' id='text' placeholder='New message' />";
        html += "<input  id='hidden' type='hidden' value='"+this.id+"'/>";
        html += "<br />";
        html += "<input type='submit' value='Send' id='send' class='btn btn-primary'/>";
        html += "<a id='close' href='#'>Close</a>";

        $('#div_msg').append(html).show('fast');
        $('#close').click(function(e){
            e.preventDefault();

            $('#div_msg').hide('fast');
            window.location.reload()


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



    function message_view(message){
        console.log(message);
        var from_id = $('#from_id').val();
        $.each(message, function(index, value){
            var xclass = '';
            if(from_id == value.from_id){
                xclass ='from_msg';

            } else{
                xclass = 'to_msg';

            }
            var msg = "<span class=" + xclass + ">" + value.message_text + "</span>";
            $('#history').append(msg).append("<br /> <br />");
        });
    }


})


