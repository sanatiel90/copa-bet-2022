<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGamesTableSetFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->integer('goals_team_home')->nullable()->change();
            $table->integer('goals_team_away')->nullable()->change();
            $table->unsignedBigInteger('best_player_id')->nullable()->change();            
            $table->unsignedBigInteger('first_scorer_id')->nullable()->change();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
