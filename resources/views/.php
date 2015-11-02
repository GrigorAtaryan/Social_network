
<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;

            font-weight: bolder;
            font-family: 'Lato';
        }

        .container {
            border:1px solid;
            text-align: center;

        }

        .content {
            border:1px solid;
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 50px;
        }
        .title_profile {
            font-size: 30px;
            width:400px;
        }
        .span{

            font-family: 'Lato';
            letter-spacing: 1px;
            font-size: 25px;
        }
        a{

            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
            padding:10px;
            font-wight:bold;
            color:blue;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Social Network</div>
    </div><br />
    <a href="{{url('photo')}}">Photos</a>
    <a href="#">Settings</a>
    <div style="width:100%; margin:0px auto; border:3px solid">