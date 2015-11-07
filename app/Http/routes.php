<?php

Route::get('/', 'UserController@index');
Route::post('registration',  'UserController@create');
Route::post('login', 'UserController@login');
Route::get('account', 'UserController@account');
Route::get('logout', 'UserController@logout');
Route::post('update', 'UserController@update');
Route::post('search', 'UserController@search_user');
Route::get('get_user/{id}', 'UserController@search_user_profile');

Route::get('photo', 'ImageController@index');
Route::post('upload', 'ImageController@store');
Route::get('delete_photo/{id}', 'ImageController@destroy');
Route::post('set_feature_image', ['uses'=>'ImageController@set_feature']);


Route::post('add_friend_request', 'FriendController@create');
Route::get('confirm_request/{id}', 'FriendController@confirm_friend_request');


Route::post('write_message', 'MessageController@create_message');
Route::post('show_messages', 'MessageController@show_messages');
Route::post('update_message', 'MessageController@update_messages');




Route::get('settings', function(){
    return view('settings');
});




