@include('header')
<div id="middle"><br/><br/>

    <div id="div_profile">
        <div class="title_profile"><code>Profile</code></div>
        <span class="span">{{  $user_data->firstname }}</span> &nbsp;
        <span class="span">{{  $user_data->lastname }}</span><br/>
        @foreach($image as $feature)
            <img   class="img-circle" width="150" height="150" src="images/{{ $feature->path  }}"/>
        @endforeach
        <div style="border:0px solid; width:350px;">

            <?php if(!empty($requests)){ ?>
                <span class="title_profile"><code>Friend Requests</code></span><br />
                <table class="table-bordered">
                @foreach($requests as $request)
                   <tr>
                       <td><span class="span"> <?php echo $request->firstname ?></span></td>
                       <td><span class="span"> <?php echo $request->lastname ?></span></td>
                       <td><a href="{{ url('confirm_request/' . $request->id) }}"><button type="button" class="btn btn-success">Confirm</button></a></td>
                       <td><a><button type="button" class="btn btn-danger">Delete</button></a></td>
                   </tr>
                @endforeach
                </table>
            <?php } ?>
        </div>
    </div>


    <div id="div_all_users">
        <div class="title_profile"><code>Users</code></div>
        <table class="table table-hover">

            <?php
            $users = App\User::all();
            $user_id = Auth::User()->id;

            foreach($users as $users_list){
            if($users_list->id == $user_id){
                continue;
            }else{
            ?>
            <tr>
                <td><span class="span">{{  $users_list->firstname }}</span></td>
                <td><span class="span">{{  $users_list->lastname }}</span></td>
                <td><img class="friend_request" id="{{$users_list->id}}" width="30" height="30" src="images/add.png"/>
                </td>
            </tr>
            <?php
            }
            }
            ?>
            </tr>
        </table>
        <div id="div_friends">
            <?php if(!empty($all_friends)){ ?>
            <span class="title_profile"><code>Friends</code></span><br />
            <table style="width:380px " class="table-bordered">
                @foreach($all_friends as $friends)
                    <tr>
                        <td><span class="span"> <?php echo $friends->firstname ?></span></td>
                        <td><span class="span"> <?php echo $friends->lastname ?></span></td>
                        <td><img class='message' id="<?php echo $friends->id ?>" width="30" height="30" src="images/msg.png"/></td>
                    </tr>
                @endforeach
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<div id="div_msg">

</div>
@include('footer');