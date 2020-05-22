<?php

use App\RecruitmentTagCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentTagCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_tag_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", RecruitmentTagCategory::NAME_MAX_LENGTH)->unique();
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
        Schema::dropIfExists('recruitment_tag_categories');
    }
}
