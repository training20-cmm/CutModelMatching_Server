<?php

use App\ModelAppIssue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelAppIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_app_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string("content", ModelAppIssue::CONTENT_MAX_LENGTH);
            $table->integer("model_id")->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('model_app_issues');
    }
}
