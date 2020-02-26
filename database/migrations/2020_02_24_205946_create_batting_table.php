<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBattingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batting', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->integer('player_id')->unsigned();
            $table->string('status');
            $table->integer('runs');
            $table->integer('balls');
            $table->integer('4s');
            $table->integer('6s');
            $table->float('strike_rate');
            $table->timestamps();

            $table->foreign('match_id', 'batting_match_id_foreign_key')->references('id')->on('matches')->onDelete('cascade');
            $table->foreign('player_id', 'batting_player_id_foreign_key')->references('id')->on('players')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batting');
    }
}
