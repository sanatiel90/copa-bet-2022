<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->dateTime('game_time');
            $table->unsignedBigInteger('round_id');
            $table->foreign('round_id')->references('id')->on('rounds');
            $table->unsignedBigInteger('team_home_id');
            $table->foreign('team_home_id')->references('id')->on('teams');
            $table->unsignedBigInteger('team_away_id');
            $table->foreign('team_away_id')->references('id')->on('teams');
            $table->integer('goals_team_home');
            $table->integer('goals_team_away');
            $table->unsignedBigInteger('best_player_id');
            $table->foreign('best_player_id')->references('id')->on('players');
            $table->unsignedBigInteger('first_scorer_id');
            $table->foreign('first_scorer_id')->references('id')->on('players');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
