<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->integer("salon_id")->unsigned();
            $table->timestamps();
            $table->foreign("salon_id")->references("id")->on("salons");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salon_payment_methods');
    }
}
