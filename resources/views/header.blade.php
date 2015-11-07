
<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{URL::to('css/style.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ URL::to('js/jquery-1.11.3.js')}}"></script>

            {{--            BOOTSTRAP         --}}
    <link href="{{ URL::to('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ URL::to('js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::to('js/app.js')}}"></script>

    <script type="text/javascript"><!--
        google_ad_client = "pub-4676076416761636";
        /* 468x60, created 6/1/11 */
        google_ad_slot = "6737226473";
        google_ad_width = 468;
        google_ad_height = 60;
        //-->
    </script>


</head>
<body>
<div class="container">
    <div style="float:right"><a href="{{ url('logout')  }}"><img width="50" height="50" src="images/logout.png" /></a></div>
    <div class="content">
        <div class="title">Social Network</div>
    </div><br />
    <table class="table table-condensed">
        <tr>
            <td><a class="span" href="{{url('account')}}">My profile</a></td>
            <td><a class="span"href="{{url('photo')}}">Photos</a></td>
            <td><a class="span" href="{{url('settings')}}">Settings</a></td>
            <td>
                <div id="dark">
                    <form id="form_search">
                        <input id="searchh" type="text" size="40" placeholder="Search..." />
                    </form>
                    <div id="dark1">

                    </div>
                </div>

            </td>
         </tr>
    </table>
<script>
    $(document).ready(function() {
        $('#searchh').keyup(function () {

            var search = $('#searchh').val();
            var url_search = "/search";
            if(search != "") {
                $.ajax({
                    url: url_search,
                    type: "POST",
                    data: {search: search},
                    success: function (out_search) {
                        var div = "<div class='search_div'>";
                        $(out_search).each(function (index, value) {
                            var url = '/get_user/' + value.id;
                            div += "<a class='search_a' href='"+ url +"'>" + value.firstname + " " + value.lastname +"</a><br/>";
                        });
                        div += '</div>';
                        $("#dark1").html(div);


                    }

                });
            }else{
                $("#dark1").html("<span> NO RESULT </span>");
            }
        });
    });
</script>