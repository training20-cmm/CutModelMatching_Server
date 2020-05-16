<?php

use App\Salon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("postcode", Salon::POSTCODE_MAX_LENGTH)->unique();
            $table->string("prefecture", Salon::PREFECTURE_MAX_LENGTH);
            $table->string("address", Salon::ADDRESS_MAX_LENGTH);
            $table->string("building", Salon::BUILDING_MAX_LENGTH);
            $table->string("bio_text", Salon::BIO_TEXT_MAX_LENGTH);
            $table->string("profile_image_path", Salon::PROFILE_IMAGE_PATH_MAX_LENGTH);
            $table->string("header_image_path", Salon::HEADER_IMAGE_PATH_MAX_LENGTH);
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
        Schema::dropIfExists('salons');
    }
}
