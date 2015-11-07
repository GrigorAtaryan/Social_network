
// friend request
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


//  Update messages status
$(document).ready(function(){
    function update_msg_status(){
        var url_update_msg_status = "/update_message";
        var to_id = $('.message').attr('id');

        $.ajax({
            url: url_update_msg_status,
            type: "POST",
            data: {to_id: to_id},
            dataType: "json",
            success:function(out){

                $.each(out, function(index, to_id){
                    $(".new_msg_"+to_id.from_id).show();
                });
            }
        });

    }

    setInterval(update_msg_status, 1000);

    // Show Messages
    $('.message').on('click', function(){

        var url_show_msg = "/show_messages";
        $.ajax({
            url: url_show_msg,
            type: "POST",
            data: {id: this.id},
            success: function(out){
                console.log(out);

                message_view(out,'oldMsg');


            }
        })

        var from_id = $('#from_id').val();
        var html = "";
        html += "<a id='close' href='#'>X</a><div  id='history'></div>";
        html += "<br /><br /><input type='text' id='text' placeholder='New message' />";
        html += "<input  id='hidden' type='hidden' value='"+this.id+"'/> &nbsp ";
        html += "<input type='submit' value='Send' id='send' class='btn btn-primary'/>";



        $('#div_msg').append(html).show('fast');
        $('#close').click(function(e){
            e.preventDefault();
            $('#div_msg').hide('fast');
            window.location.reload()


        })
    });

    // Write Messages
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
                 var  massage = $('#text').val();
                message_view(massage,'newMsg');
                //window.location.reload();
            }
        });


    });

    // View Messages
    function message_view(message, check) {

        if(check =="oldMsg"){
            var from_id = $('#from_id').val();
            $.each(message, function (index, value) {
                var xclass = '';
                if (from_id == value.from_id) {
                    xclass = 'from_msg';

                } else {
                    xclass = 'to_msg';

                }
                var msg = "<span class=" + xclass + ">" + value.message_text + "</span>";
                $('#history').append(msg).append("<br /> <br />");
            });
        }else if(check =="newMsg"){
            var msg = "<span class='from_msg'>" + message + "</span>";
            $('#history').append(msg).append("<br /> <br />");
        }
    }


})


