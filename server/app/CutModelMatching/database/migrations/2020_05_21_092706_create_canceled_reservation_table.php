<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanceledReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canceled_reservation', function (Blueprint $table) {
            $table->integer("menu_id")->unsigned();
            $table->integer("model_id")->unsigned();
            $table->dateTime("reserved_at");
            $table->timestamps();
            $table->primary(["menu_id", "model_id"]);
            $table->foreign("model_id")->references("id")->on("models");
            $table->foreign("menu_id")->references("id")->on("menus");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canceled_reservation');
    }
}
