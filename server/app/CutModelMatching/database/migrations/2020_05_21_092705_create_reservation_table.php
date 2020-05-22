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
            $table->increments('id');
            $table->integer("model_id")->unsigned();
            $table->integer("recruitment_id")->unsigned()->unique();
            $table->timestamps();
            $table->foreign("model_id")->references("id")->on("models");
            $table->foreign("recruitment_id")->references("id")->on("recruitment");
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
