<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->integer('stadium_id')->unsigned();
            $table->integer('toss_winner')->unsigned();
            $table->boolean('bat_first');
            $table->integer('match_player')->unsigned();
            $table->integer('winner')->unsigned();
            $table->string('description');
            $table->timestamps();

            $table->foreign('stadium_id', 'matches_stadium_id_foreign_key')->references('id')->on('stadiums')->onDelete('cascade');
            $table->foreign('toss_winner', 'matches_toss_winner_foreign_key')->references('id')->on('total_teams')->onDelete('cascade');
            $table->foreign('match_player', 'matches_match_player_foreign_key')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('winner', 'matches_winner_foreign_key')->references('id')->on('total_teams')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
