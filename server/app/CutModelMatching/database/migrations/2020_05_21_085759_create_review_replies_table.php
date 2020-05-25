<?php

use App\ReviewReply;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->string("content", ReviewReply::CONTENT_MAX_LENGTH);
            $table->integer("review_id")->unsigned();
            $table->timestamps();
            $table->foreign("review_id")->references("id")->on("reviews");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_replies');
    }
}
