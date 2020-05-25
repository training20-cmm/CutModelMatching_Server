<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->integer("model_id")->unsigned();
            $table->integer("menu_id")->unsigned()->unique();
            $table->timestamps();
            $table->primary(["model_id", "menu_id"]);
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
        Schema::dropIfExists('reservation');
    }
}
