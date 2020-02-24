<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFallOfWicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fall_of_wickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('player_id')->unsigned();
            $table->integer('match_stats_id')->unsigned();
            $table->integer('runs');
            $table->integer('over');
            $table->integer('wicket');
            $table->timestamps();

            $table->foreign('player_id', 'fall_of_wickets_player_id_foreign_key')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('match_stats_id', 'fall_of_wickets_match_stats_id_foreign_key')->references('id')->on('match_stats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fall_of_wickets');
    }
}
