<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['from_id', 'to_id', 'message_text'];

    public function insert_messages($to_id, $message_text){
        \DB::table($this->table)->insert(array('from_id' => Auth::User()->id, 'to_id' => $to_id, 'message_text' => $message_text));
    }

    public function show_messages($to_id){
       $msg_result =  \DB::table($this->table)->where(array('from_id' => Auth::User()->id, 'to_id' => $to_id))->OrWhere(array('from_id' => $to_id, 'to_id' => Auth::User()->id))->get();
       return $msg_result;
    }

    public function get_new_messages($from_id){
        $result = \DB::table($this->table)->where(array('to_id' => $from_id, 'is_read' => 0 ))->get();
        return $result;
//    }
    }

    public function read_msg($message_id){
        \DB::table($this->table)->where('id', $message_id)->update(array('is_read' => 1));

    }

}
