<?php

use App\PasswordResetToken;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string("token", PasswordResetToken::TOKEN_MAX_LENGTH)->unique();
            $table->date("expiration");
            $table->integer("user_id")->unsigned();
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_reset_tokens');
    }
}
