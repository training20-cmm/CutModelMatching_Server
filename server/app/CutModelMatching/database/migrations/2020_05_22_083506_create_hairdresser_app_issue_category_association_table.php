<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairdresserAppIssueCategoryAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hairdresser_app_issue_category_association', function (Blueprint $table) {
            $table->integer("hairdresser_app_issue_id")->unsigned();
            $table->integer("app_issue_category_id")->unsigned();
            $table->timestamps();
            $table->foreign("hairdresser_app_issue_id")->references("id")->on("hairdresser_app_issues")->name("hairdresser_category_issue_association_issue_foreign");
            $table->foreign("app_issue_category_id")->references("id")->on("app_issue_categories")->name("hairdresser_category_issue_association_category_foreign");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hairdresser_app_issue_category_association');
    }
}
