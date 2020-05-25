<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairstyleFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairstyle_favorites', function (Blueprint $table) {
            $table->integer("hairstyle_id")->unsigned();
            $table->integer("model_id")->unsigned();
            $table->primary(["hairstyle_id", "model_id"]);
            $table->timestamps();
            $table->foreign("hairstyle_id")->references("id")->on("hairstyles");
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
        Schema::dropIfExists('hairstyle_favorites');
    }
}
