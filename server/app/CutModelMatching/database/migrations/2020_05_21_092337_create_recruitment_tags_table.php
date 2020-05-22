<?php

use App\RecruitmentTag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", RecruitmentTag::NAME_MAX_LENGTH)->unique();
            $table->char("color", RecruitmentTag::COLOR_LENGTH);
            $table->integer("category_id")->unsigned();
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("recruitment_tag_categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_tags');
    }
}
