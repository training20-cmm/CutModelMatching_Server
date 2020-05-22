<?php

use App\HairstyleTag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairstyleTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairstyle_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", HairstyleTag::NAME_MAX_LENGTH)->unique();
            $table->char("color", HairstyleTag::COLOR_LENGTH);
            $table->integer("category_id")->unsigned();
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("hairstyle_tag_categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hairstyle_tags');
    }
}
