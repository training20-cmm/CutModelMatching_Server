<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_time', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger("start")->unsigned();
            $table->integer("menu_id")->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('menu_time');
    }
}
