<?php

use App\HairstyleImage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairstyleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairstyle_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string("path", HairstyleImage::PATH_MAX_LENGTH);
            $table->integer("hairstyle_id")->unsigned();
            $table->timestamps();
            $table->foreign("hairstyle_id")->references("id")->on("hairstyles");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hairstyle_images');
    }
}
