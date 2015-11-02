
<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.11.3.js"></script>

            {{--            BOOTSTRAP         --}}
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>

</head>
<body>
<div class="container">
    <div style="float:right"><a href="{{ url('logout')  }}"><img width="50" height="50" src="images/logout.png" /></a></div>
    <div class="content">
        <div class="title">Social Network</div>
    </div><br />
    <table class="table table-condensed">
        <tr>
            <td><a class="span" href="{{url('account')}}">Profile</a></td>
            <td><a class="span"href="{{url('photo')}}">Photos</a></td>
            <td><a class="span" href="{{url('settings')}}">Settings</a></td>
         </tr>
    </table>