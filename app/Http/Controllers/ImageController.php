<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;

class ImageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = new image();
        $user_images = $image->get_user_images();

        return view('photo')->with('user_images', $user_images);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function set_feature()
    {
        $img_id = Input::all();
        $image = new image();

        $image->set_feature($img_id);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::User()->id;

        if(Input::file()){

            $file_image = array('image' => Input::file('file_image'));
            $rules = array('image' => 'required',);
            $validator = validator::make( $file_image, $rules );

            if($validator->fails()){
                return redirect::to('photo')->withInput()->withErrors($validator);
            }
            else{
                if(Input::file('file_image')->isValid()){
                    $path = '../public/images';
                    $extension = Input::file('file_image')->getClientOriginalExtension();
                    $fileName = rand().'.'.$extension;
                    Input::file('file_image')->move($path, $fileName);
                    Image::create(array('user_id' => $user_id, 'path' => $fileName));
                    Session::flash('success', 'Upload successfully');
                    return Redirect::to('photo');
                }else{
                    Session::flash('error', 'uploaded file is not valid');
                    return Redirect::to('photo');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = new image();
        $image->delete_user_images($id);
        
        return Redirect::to('photo');
    }
}
