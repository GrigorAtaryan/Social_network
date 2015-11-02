<?php

Route::get('/', 'UserController@index');

Route::post('registration',  'UserController@create');

Route::post('login', 'UserController@login');


Route::get('account', 'UserController@account');

Route::get('logout', 'UserController@logout');

Route::get('photo', 'ImageController@index');

Route::post('add_friend_request', 'FriendController@create');

Route::post('write_message', 'MessageController@write');

Route::post('showMessages', 'MessageController@show');

Route::get('confirm_request/{id}', 'FriendController@confirm_friend_request');

Route::post('upload', 'ImageController@store');

Route::post('set_feature_image', ['uses'=>'ImageController@set_feature']);

Route::get('delete_photo/{id}', 'ImageController@destroy');

Route::get('settings', function(){
    return view('settings');
});

Route::post('update', 'UserController@update');


