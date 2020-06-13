<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuSearchResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_search_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("search_id")->unsigned();
            $table->integer("menu_id")->unsigned();
            $table->timestamps();
            $table->foreign("search_id")->references("id")->on("searches");
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
        Schema::dropIfExists('menu_search_results');
    }
}
