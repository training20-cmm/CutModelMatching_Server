<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentTagAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_tag_association', function (Blueprint $table) {
            $table->integer("recruitment_id")->unsigned();
            $table->integer("tag_id")->unsigned();
            $table->timestamps();
            $table->primary(["recruitment_id", "tag_id"]);
            $table->foreign("recruitment_id")->references("id")->on("recruitment");
            $table->foreign("tag_id")->references("id")->on("recruitment_tags");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_tag_association');
    }
}
