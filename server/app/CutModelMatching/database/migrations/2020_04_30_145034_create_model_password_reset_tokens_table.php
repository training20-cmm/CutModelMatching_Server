<?php

use App\ModelPasswordResetToken;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelPasswordResetTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_password_reset_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string("token", ModelPasswordResetToken::TOKEN_MAX_LENGTH)->unique();
            $table->date("expiration");
            $table->integer("model_id")->unsigned();
            $table->timestamps();
            $table->foreign("model_id")->references("id")->on("models");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_password_reset_tokens');
    }
}
