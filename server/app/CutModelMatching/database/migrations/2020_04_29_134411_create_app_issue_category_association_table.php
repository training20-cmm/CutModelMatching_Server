<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppIssueCategoryAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_issue_category_association', function (Blueprint $table) {
            $table->integer("app_issue_id")->unsigned();
            $table->integer("app_issue_category_id")->unsigned();
            $table->timestamps();
            $table->primary(["app_issue_id", "app_issue_category_id"])->name("app_issue_category_association_primary");
            $table->foreign("app_issue_id")->references("id")->on("app_issues");
            $table->foreign("app_issue_category_id")->references("id")->on("app_issue_categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_issue_category_association');
    }
}
