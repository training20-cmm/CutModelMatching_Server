<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonPaymentMethodAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_payment_method_association', function (Blueprint $table) {
            $table->integer("salon_id")->unsigned();
            $table->integer("salon_payment_method_id")->unsigned();
            $table->timestamps();
            $table->foreign("salon_id")->references("id")->on("salons");
            $table->foreign("salon_payment_method_id")->references("id")->on("salon_payment_methods");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salon_payment_method_association');
    }
}
