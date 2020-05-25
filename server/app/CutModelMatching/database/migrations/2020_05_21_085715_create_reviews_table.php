<?php

use App\Review;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string("content", Review::CONTENT_MAX_LENGTH);
            $table->tinyInteger("skill")->unsigned();
            $table->tinyInteger("service")->unsigned();
            $table->tinyInteger("salon")->unsigned();
            $table->tinyInteger("app")->unsigned();
            $table->integer("model_id")->unsigned();
            $table->integer("hairdresser_id")->unsigned();
            $table->timestamps();
            $table->foreign("model_id")->references("id")->on("models");
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
        Schema::dropIfExists('reviews');
    }
}
