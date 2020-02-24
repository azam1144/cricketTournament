<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('series_id')->unsigned();
            $table->string('name');
            $table->integer('matches');
            $table->integer('won');
            $table->integer('lost');
            $table->integer('points');
            $table->integer('net_run_rate');
            $table->timestamps();

            $table->foreign('series_id', 'total_teams_series_id_foreign_key')->references('id')->on('series')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_teams');
    }
}
