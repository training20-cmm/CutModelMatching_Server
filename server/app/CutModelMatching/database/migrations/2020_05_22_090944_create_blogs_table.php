<?php

use App\Blog;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title", Blog::TITLE_MAX_LENGTH);
            $table->string("content", Blog::CONTENT_MEX_LENGTH);
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
        Schema::dropIfExists('blogs');
    }
}
