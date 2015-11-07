<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Image extends Model
{
   protected $table = 'images';
   protected $fillable = ['user_id', 'path', 'feauture' ];



    public function get_user_images(){
        $user_photos = \DB::table($this->table)->where('user_id', Auth::User()->id)->get();
        return($user_photos);
    }

    public function get_feature_image(){
        $feature_img = \DB::table($this->table)->where(array('user_id' => Auth::User()->id, 'feauture' => 1))->get();
        return $feature_img;
    }

    public function set_feature($image_id){
        \DB::Statement("update images set feauture = 0 where user_id=:user_id", [':user_id'=>Auth::User()->id]);
        \DB::table($this->table)->where('id', $image_id)->update(array("feauture" => 1));
    }

    public function delete_user_images($id){
        \DB::table($this->table)->where('id', $id)->delete();
    }


    public function get_search_user_images($search_id){
        $user_photos = \DB::table($this->table)->where('user_id', $search_id)->get();
        return($user_photos);
    }


}

