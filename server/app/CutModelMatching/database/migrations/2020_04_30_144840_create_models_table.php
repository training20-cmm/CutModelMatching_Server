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
            $table->string('name', Model::NAME_MAX_LENGTH);
            $table->string("bio_text", Model::BIO_TEXT_MAX_LENGTH)->default("");
            $table->char("gender", Model::GENDER_LENGTH);
            $table->date("birthday");
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
        Schema::dropIfExists('models');
    }
}
