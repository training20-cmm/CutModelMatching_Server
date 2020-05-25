<?php

use App\ChatMessage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string("content", ChatMessage::CONTENT_MAX_LENGTH)->nullable();
            $table->string("image_path")->nullable();
            $table->integer("sender_user_id")->unsigned();
            $table->integer("receiver_user_id")->unsigned();
            $table->timestamps();
            $table->foreign("sender_user_id")->references("id")->on("users");
            $table->foreign("receiver_user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
}
