<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_time',
        'round_id',
        'team_home_id',
        'team_away_id',        
        'best_player_id',
        'first_scorer_id',
        'goals_team_home',
        'goals_team_away'
    ];

    //protected $with = ['round', 'teamHome', 'teamAway', 'bestPlayer', 'firstScorer'];

    public function round() {
        return $this->belongsTo(Round::class);
    }

    public function teamHome() {
        return $this->belongsTo(Team::class, 'team_home_id');        
    }

    public function teamAway() {
        return $this->belongsTo(Team::class, 'team_away_id');        
    }

    public function bestPlayer() {
        return $this->belongsTo(Player::class, 'best_player_id');        
    }

    public function firstScorer() {
        return $this->belongsTo(Player::class, 'first_scorer_id');        
    }

}
