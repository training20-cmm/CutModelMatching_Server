<?php

use App\MenuTag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", MenuTag::NAME_MAX_LENGTH)->unique();
            $table->char("color", MenuTag::COLOR_LENGTH);
            $table->integer("category_id")->unsigned();
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("menu_tag_categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_tags');
    }
}
