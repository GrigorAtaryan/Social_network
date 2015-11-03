<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Input;


class MessageController extends Controller
{

    public function create_message()
    {
        $message = new Message();
        $message_text = $_POST['msg_text'];
        $to_id = $_POST['id'];

        $message->insert_messages($to_id, $message_text);
    }


    public function show_messages()
    {
        $message = new Message();
        $to_id = $_POST['id'];
        $msg = $message->show_messages($to_id);
        return $msg;



    }
//
//    public function update_messages()
//    {
//        $from_id = Auth::User()->id;
//
//        $message = new Message();
//        $new_msg = $message->get_new_messages($from_id);
//        var_dump($new_msg);die;
//        $arr = array();
//        foreach ($new_msg as $new_messages) {
//            $arr['from_id'] = $new_messages['to_id'];
//        }
//
//
//        echo json_encode(array('new_msg' => $arr));
//    }

    public function edit($id)
    {
        //
    }



    public function destroy($id)
    {
        //
    }
}
