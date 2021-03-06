<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;


    protected $table = 'users';

    public function friend_request()
    {
        return $this->hasMany('App\friend');
    }

    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'remember_token'];

    protected $hidden = ['password', 'remember_token'];

    public function update_settings($data){
       \DB::table($this->table)->where('id', Auth::User()->id)->update($data);
    }

    public function get_user($id) {
        $result_users = \DB::table($this->table)->where('id', $id)->first();
        return $result_users;
    }

    public function search_users($search){
        $result_search = \DB::table($this->table)->where('firstname', 'like', "%" . $search . "%")->OrWhere('lastname', 'like', "%" . $search . "%")->get();
        return  $result_search;
    }


}
