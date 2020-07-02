<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitedReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visited_reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("menu_id")->unsigned();
            $table->integer("menu_time_id")->unsigned();
            $table->integer("model_id")->unsigned();
            $table->dateTime("reserved_at");
            $table->timestamps();
            $table->foreign("menu_id")->references("id")->on("menus");
            $table->foreign("menu_time_id")->references("id")->on("menu_time");
            $table->foreign("model_id")->references("id")->on("models");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visited_reservation');
    }
}
