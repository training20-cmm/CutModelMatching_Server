<?php

use App\Domain\ModelIdentifier;
use App\Domain\ModelName;
use App\Domain\ModelPassword;
use App\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->increments('id');
            $table->string("identifier", Model::IDENTIFIER_MAX_LENGTH)->unique();
            $table->string('password', Model::PASSWORD_MAX_LENGTH);
            $table->string('name', Model::NAME_MAX_LENGTH);
            $table->string('email', Model::EMAIL_MAX_LENGTH)->unique()->nullable();
            $table->char("gender", Model::GENDER_LENGTH);
            $table->date("birthday");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
}
