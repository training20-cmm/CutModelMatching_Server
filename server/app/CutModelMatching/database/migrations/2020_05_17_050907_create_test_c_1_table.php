<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestC1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_c_1', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("password");
            $table->integer("c_id")->unsigned();
            $table->timestamps();
            $table->foreign("c_id")->references("id")->on("test_c");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_c_1');
    }
}
