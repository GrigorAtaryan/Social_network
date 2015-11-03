<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Message;
use Input;


class MessageController extends Controller
{

    public function create_message()
    {
        $message = new Message();
        $message_text = $_POST['msg_text'];
        $to_id = $_POST['id'];
        var_dump($message_text);
        $message->insert_message($to_id, $message_text);
    }


    public function show()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /*
    public function show($id)
    {
        //
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
        //
    }
}
