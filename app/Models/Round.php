<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_winner_id'        ,
        'winner_points'
    ];

    protected $with = ['games'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function games() {
        return $this->hasMany(Game::class);
    }
}
