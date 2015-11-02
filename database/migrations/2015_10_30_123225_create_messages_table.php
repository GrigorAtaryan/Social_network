<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{

    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from_id');
            $table->string('to_id');
            $table->longText('message_text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('messages');
    }
}
