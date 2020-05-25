<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTagAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_tag_association', function (Blueprint $table) {
            $table->integer("menu_id")->unsigned();
            $table->integer("tag_id")->unsigned();
            $table->timestamps();
            $table->primary(["menu_id", "tag_id"]);
            $table->foreign("menu_id")->references("id")->on("menus");
            $table->foreign("tag_id")->references("id")->on("menu_tags");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_tag_association');
    }
}
