;<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateHairdresserSearchResultsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('hairdresser_search_results', function (Blueprint $table) {
                $table->increments('id');
                $table->integer("search_id")->unsigned();
                $table->integer("hairdresser_id")->unsigned();
                $table->timestamps();
                $table->foreign("search_id")->references("id")->on("searches");
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
            Schema::dropIfExists('hairdresser_search_results');
        }
    }
