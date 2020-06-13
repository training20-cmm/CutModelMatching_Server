<?php

use App\Hairdresser;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairdressersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairdressers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', Hairdresser::NAME_MAX_LENGTH);
            $table->string("ruby", Hairdresser::RUBY_MAX_LENGTH);
            $table->string("bio_text", Hairdresser::BIO_TEXT_MAX_LENGTH)->default("");
            $table->string("specialty", Hairdresser::SPECIALTY_MAX_LENGTH)->default("");
            $table->string("profile_image_path", Hairdresser::PROFILE_IMAGE_PATH_MAX_LENGTH)->nullable();
            $table->char("gender", Hairdresser::GENDER_LENGTH);
            $table->date("birthday");
            $table->tinyInteger("years")->unsigned()->nullable();
            $table->integer("salon_id")->unsigned()->nullable();
            $table->integer("user_id")->unsigned();
            $table->integer("position_id")->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign("salon_id")->references("id")->on("salons");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("position_id")->references("id")->on("hairdresser_positions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hairdressers');
    }
}
