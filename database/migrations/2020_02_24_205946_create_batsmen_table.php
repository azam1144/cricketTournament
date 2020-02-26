<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatsmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batsmen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_stats_id')->unsigned();
            $table->integer('player_id')->unsigned();
            $table->string('stats');
            $table->integer('run');
            $table->integer('balls');
            $table->integer('4s');
            $table->integer('6s');
            $table->float('strike_rate');
            $table->timestamps();

            $table->foreign('match_stats_id', 'batsman_match_stats_id_foreign_key')->references('id')->on('match_stats')->onDelete('cascade');
            $table->foreign('player_id', 'batsman_player_id_foreign_key')->references('id')->on('players')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batsmen');
    }
}
