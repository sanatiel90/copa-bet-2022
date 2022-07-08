<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'best_player_id',
        'first_scorer_id',
        'goals_team_home',
        'goals_team_away',
        'confirmed'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function bestPlayer() {
        return $this->belongsTo(Player::class, 'best_player_id');        
    }

    public function firstScorer() {
        return $this->belongsTo(Player::class, 'first_scorer_id');        
    }
}
