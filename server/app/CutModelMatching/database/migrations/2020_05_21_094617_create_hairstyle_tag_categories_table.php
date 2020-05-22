<?php

use App\HairstyleTagCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairstyleTagCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairstyle_tag_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", HairstyleTagCategory::NAME_MAX_LENGTH)->unique();
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
        Schema::dropIfExists('hairstyle_tag_categories');
    }
}
