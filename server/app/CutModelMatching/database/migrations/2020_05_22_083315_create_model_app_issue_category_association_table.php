<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelAppIssueCategoryAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_app_issue_category_association', function (Blueprint $table) {
            $table->integer("model_app_issue_id")->unsigned();
            $table->integer("app_issue_category_id")->unsigned();
            $table->timestamps();
            $table->foreign("model_app_issue_id")->references("id")->on("model_app_issues")->name("model_category_issue_association_issue_foreign");
            $table->foreign("app_issue_category_id")->references("id")->on("app_issue_categories")->name("model_category_issue_association_category_foreign");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_app_issue_category_association');
    }
}
