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
        return json_encode(array("status" => "success", 'massage' => "Added"));
    }


    public function show_messages()
    {
        $message = new Message();
        $to_id = $_POST['id'];
        $msg = $message->show_messages($to_id);
        $msg_result = json_decode(json_encode($msg), true);


        foreach ($msg_result as $conversation) {
            if ($conversation['from_id'] != Auth::User()->id) {
                $message->read_msg($conversation['id']);
            }
        }
        return $msg;


    }

    public function update_messages()
    {
        $from_id = Auth::User()->id;
        $message = new Message();
        $new_msg = $message->get_new_messages($from_id);



        echo json_encode(array('new_msg' => $new_msg));
    }
}