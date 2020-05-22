<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairstyleTagAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairstyle_tag_association', function (Blueprint $table) {
            $table->integer("hairstyle_id")->unsigned();
            $table->integer("tag_id")->unsigned();
            $table->timestamps();
            $table->primary(["hairstyle_id", "tag_id"]);
            $table->foreign("hairstyle_id")->references("id")->on("hairstyles");
            $table->foreign("tag_id")->references("id")->on("hairstyle_tags");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hairstyle_tag_association');
    }
}
