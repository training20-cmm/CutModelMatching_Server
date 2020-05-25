<?php

use App\Hairstyle;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairstylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairstyles', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title", Hairstyle::TITLE_MAX_LENGTH);
            $table->string("commenht", Hairstyle::COMMENT_MAX_LENGTH);
            $table->string("image_path", Hairstyle::IMAGE_PATH_MAX_LENGTH);
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
        Schema::dropIfExists('hairstyles');
    }
}
