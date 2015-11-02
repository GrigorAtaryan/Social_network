<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\friend;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{

    public function create()
    {

        $input = Input::all();

        $friend = new friend;
        $friend->user_id = Auth::User()->id;
        $friend->friend_id = $input['id'];
        $friend->approve = 1;
        $friend->save();

        $friend = new friend;
        $friend->friend_id = Auth::User()->id;
        $friend->user_id = $input['id'];

        $friend->save();


    }

    public function show_request()
    {
        $friend = new friend;
        $friend->show_friend_request();
    }

    public function confirm_friend_request($id)
    {
        $friend = new friend();
        $friend->confirm_friend_request($id);

        return Redirect('account');
    }


    public function destroy($id)
    {
        //
    }
}
