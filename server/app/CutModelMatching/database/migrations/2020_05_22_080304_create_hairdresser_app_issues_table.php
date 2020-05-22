<?php

use App\HairdresserAppIssue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairdresserAppIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairdresser_app_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string("content", HairdresserAppIssue::CONTENT_MAX_LENGTH);
            $table->integer("hairdresser_id")->unsigned();
            $table->timestamps();
            $table->foreign("hairdresser_id")->references("id")->on("hairdressers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hairdresser_app_issues');
    }
}
