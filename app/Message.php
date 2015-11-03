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

    public function insert_message($to_id, $message_text){
        \DB::table($this->table)->insert(array('from_id' => Auth::User()->id, 'to_id' => $to_id, 'message_text' => $message_text));
    }

}
