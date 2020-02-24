<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('team_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->string('name');
            $table->string('age');
            $table->integer('total_matches')->nullable(true);
            $table->integer('strike_rate')->nullable(true);
            $table->integer('wicket_keeper')->nullable(true);
            $table->integer('captain')->nullable(true);
            $table->timestamps();

            $table->foreign('team_id', 'players_team_id_foreign_key')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('role_id', 'players_role_id_foreign_key')->references('id')->on('player_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
