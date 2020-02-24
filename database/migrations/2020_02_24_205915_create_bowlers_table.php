<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBowlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bowlers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('match_id')->unsigned();
            $table->string('p_name');
            $table->float('overs');
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

            $table->foreign('match_id', 'bowling_match_id_foreign_key')->references('id')->on('matches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bowlers');
    }
}
