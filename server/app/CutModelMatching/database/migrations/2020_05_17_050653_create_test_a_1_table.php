<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestA1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_a_1', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("password");
            $table->integer("a_id")->unsigned();
            $table->timestamps();
            $table->foreign("a_id")->references("id")->on("test_a");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_a_1');
    }
}
