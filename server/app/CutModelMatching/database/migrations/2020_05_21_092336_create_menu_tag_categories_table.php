<?php

use App\MenuTagCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTagCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_tag_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", MenuTagCategory::NAME_MAX_LENGTH)->unique();
            $table->smallInteger("index")->unsigned()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_tag_categories');
    }
}
