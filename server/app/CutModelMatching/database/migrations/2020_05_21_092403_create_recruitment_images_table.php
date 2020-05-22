<?php

use App\RecruitmentImage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string("path", RecruitmentImage::PATH_MAX_LENGTH);
            $table->integer("recruitment_id")->references("id")->on("recruitments");
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
        Schema::dropIfExists('recruitment_images');
    }
}
