<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->integer('player_id')->unsigned();
            $table->integer('maiden');
            $table->integer('runs');
            $table->integer('wickets');
            $table->integer('economy');
            $table->integer('0s');
            $table->integer('4s');
            $table->integer('6s');
            $table->integer('no_balls');
            $table->integer('wide_balls');
            $table->timestamps();

            $table->foreign('match_id', 'over_match_id_foreign_key')->references('id')->on('matches')->onDelete('cascade');
            $table->foreign('player_id', 'over_player_id_foreign_key')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overs');
    }
}
