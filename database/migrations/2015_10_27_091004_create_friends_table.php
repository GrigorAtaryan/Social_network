<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('friend_id');
            $table->string('approve')->default(0);
            $table->timestamps();
            $table->string('is_approve')->default(1);
        });
    }

    public function down()
    {
        Schema::drop('friends');
    }
}
