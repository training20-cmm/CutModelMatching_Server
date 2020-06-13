<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairdresserMenuSearchResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairdresser_menu_search_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("hairdresser_search_result_id")->unsigned();
            $table->integer("menu_id")->unsigned();
            $table->timestamps();
            $table->foreign("hairdresser_search_result_id")->references("id")->on("hairdresser_search_results")->name("hmsr_hairdresser_search_result_id_foreign");
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
        Schema::dropIfExists('hairderesser_menu_search_results');
    }
}
