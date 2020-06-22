<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTreatmentAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_treatment_association', function (Blueprint $table) {
            $table->integer("menu_id")->unsigned();
            $table->integer("menu_treatment_id")->unsigned();
            $table->timestamps();
            $table->foreign("menu_id")->references("id")->on("menus");
            $table->foreign("menu_treatment_id")->references("id")->on("menu_treatment");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_treatment_association');
    }
}
