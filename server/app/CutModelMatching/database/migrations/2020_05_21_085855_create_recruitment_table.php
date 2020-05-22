<?php

use App\Recruitment;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title", Recruitment::TITLE_MAX_LENGTH);
            $table->string("details", Recruitment::DETAILS_MAX_LENGTH);
            $table->char("gender", Recruitment::GENDER_LENGTH);
            $table->integer("price")->unsigned();
            $table->dateTime("time");
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
        Schema::dropIfExists('recruitment');
    }
}
