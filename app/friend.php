<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class friend extends Model
{

    protected $guarded = ['id'];

    protected $table = 'friends';



    public function show_friend_request(){
        $friend_request = \DB::table($this->table)->where(array('friend_id' => Auth::User()->id, 'approve' => 1, 'is_approve' =>  1))->get();
        return $friend_request;
    }

    public function confirm_friend_request($friend_id) {
        return $result_confirm_request = \DB::table($this->table)->where(array('friend_id' => Auth::User()->id, 'user_id' => $friend_id, ))
                                                                ->Orwhere(array('friend_id' => $friend_id, 'user_id' => Auth::User()->id, ))
                                                                ->update(array('approve' =>  1, 'is_approve' =>  0));

    }

    public function get_friends(){

        $result_friends = \DB::table($this->table)->where(array('user_id' => Auth::User()->id,  'approve' => 1 ))->get();
        return $result_friends;
    }


}
