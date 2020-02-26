<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBallStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ball_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_stats_id')->unsigned();
            $table->integer('bowler_id')->unsigned();
            $table->integer('batsman_id')->unsigned();
            $table->integer('ball');
            $table->integer('over');
            $table->string('stats');
            $table->timestamps();

            $table->foreign('match_stats_id', 'ball_stats_match_stats_id_foreign_key')->references('id')->on('match_stats')->onDelete('cascade');
            $table->foreign('bowler_id', 'ball_stats_bowler_id_foreign_key')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('batsman_id', 'ball_stats_batsman_id_foreign_key')->references('id')->on('players')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ball_stats');
    }
}
