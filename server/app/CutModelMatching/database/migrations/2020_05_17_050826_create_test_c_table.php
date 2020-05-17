<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_c', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("password");
            $table->integer("b_id")->unsigned();
            $table->timestamps();
            $table->foreign("b_id")->references("id")->on("test_b");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_c');
    }
}
