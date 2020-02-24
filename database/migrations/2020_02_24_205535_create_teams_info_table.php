<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('player_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('teams_id')->unsigned();
            $table->timestamps();

            $table->foreign('player_id', 'team_info_player_id_foreign_key')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('role_id', 'team_info_role_id_foreign_key')->references('id')->on('player_roles')->onDelete('cascade');
            $table->foreign('teams_id', 'team_info_teams_id_foreign_key')->references('id')->on('teams')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams_info');
    }
}
