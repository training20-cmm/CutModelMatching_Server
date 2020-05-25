<?php

use App\AppIssue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string("content", AppIssue::CONTENT_MAX_LENGTH);
            $table->integer("user_id")->unsigned();
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_issues');
    }
}
