<?php


namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Input;
use App\User;
use App\friend;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{


    public function index()
    {
        return View('log_reg');
    }



    public function create(Request $request)
    {

        $data = Input::all();

        $validator = Validator::make(
            [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'password' => $data['password'],
                'confirm_password' => $data['confirm_password'],
            ],
            [
                'firstname' => 'required|alpha_num',
                'lastname' => 'required|alpha_num',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5',
                'confirm_password' => 'required|min:5',
            ]);

        $messages = $validator->errors();

        if ($validator->fails()) {
            return redirect('/')->with('errors',$messages);
        }else{

            User::create(array(
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),

            ));

            return redirect('/')->with('message', 'Succesfully Registered');
        }
    }


    public function account(){

        if(Auth::User()) {
            $user_data = Auth::User();
        }

        $requests = array();
        $user = new user();

        $image = new image();
        $feature_img = $image->get_feature_image();

        $friend = new friend();
        $friend_request = $friend->show_friend_request();

        if(is_array($friend_request) && count($friend_request) >=1){
            foreach ($friend_request as $request) {

                $requests[] = $user->get_user($request->user_id);
            }
        }

        $get_friends = $friend->get_friends();


            foreach ($get_friends as $get_all_friend) {
                $all_friends[] = $user->get_user($get_all_friend->friend_id);

            }
            if(isset($all_friends) && count($all_friends) != 0){
                return view('account')->with(array('image' => $feature_img, 'requests' => $requests, 'user_data' => $user_data, 'all_friends' => $all_friends));
            }
            else{
            return view('account')->with(array('image' => $feature_img, 'requests' => $requests, 'user_data' => $user_data));

             }

          }


    public function login(Request $request)
    {

        $data = array(
            'email' => 'required|email',
            'password' => 'required|alpha_num'
        );

        $validator = Validator::make(Input::all(), $data);

        if($validator->fails()){
            return Redirect::to('/')->with('Invalid Email/Password');
        }else{

            if(Auth::attempt($request->only('email','password'))){

                return redirect::to('account');
            }
            else{
                return redirect::to('/');
            }

        }
    }



    public function show($id)
    {
        //
    }



    public function update(Request $request)
    {
       $data = Input::all();
       $validator  = Validator::make(
           [
              'firstname' => $data['firstname'],
              'lastname' => $data['lastname'],
           ],
           [
               'firstname' => 'min:5|alpha_num',
               'lastname' => 'min:5|alpha_num'
           ]

       );
       if($validator->fails()){
           return redirect('settings')->with('message', 'Invalid data');
       }
        else{
            $user = new User();
            $user->update_settings($data);
            return redirect::to('account');
        }

    }


    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');

    }
}
