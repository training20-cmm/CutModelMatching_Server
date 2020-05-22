<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonOpenHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_open_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger("open")->unsigned();
            $table->tinyInteger("close")->unsigned();
            $table->integer("salon_id")->unsigned();
            $table->timestamps();
            $table->foreign("salon_id")->references("id")->on("salons");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salon_open_hours');
    }
}
