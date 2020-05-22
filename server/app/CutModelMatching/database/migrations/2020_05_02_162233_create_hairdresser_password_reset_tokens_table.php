<?php

use App\HairdresserPasswordResetToken;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairdresserPasswordResetTokensTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairdresser_password_reset_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string("token", HairdresserPasswordResetToken::TOKEN_MAX_LENGTH)->unique();
            $table->date("expiration");
            $table->integer("hairdresser_id")->unsigned();
            $table->timestamps();
            $table->foreign("hairdresser_id")->references("id")->on("hairdressers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hairdresser_password_reset_tokens');
    }
}
