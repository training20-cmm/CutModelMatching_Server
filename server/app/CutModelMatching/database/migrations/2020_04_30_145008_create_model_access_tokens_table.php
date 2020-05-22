<?php

use App\ModelAccessToken;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_access_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string("token", ModelAccessToken::TOKEN_MAX_LENGTH)->unique();
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
        Schema::dropIfExists('model_access_tokens');
    }
}
