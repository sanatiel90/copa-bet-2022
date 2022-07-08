<?php

namespace App\Http\Controllers;

use ApiControllerInterface;
use App\Models\Game;
use Exception;
use Illuminate\Http\Request;

class GameController extends Controller 
{
    public function index() {
        return Game::with(['round', 'teamHome', 'teamAway', 'bestPlayer', 'firstScorer'])->get();
    }

    public function store(Request $request) {
        $request->validate([
            'game_time' => ['required', 'date'],
            'round_id' => ['required', 'numeric'],
            'team_home_id' => ['required', 'numeric'],
            'team_away_id' => ['required', 'numeric']            
        ]);
        $data = $request->all();
        return Game::create($data);
    }

    public function show($id) {
        try {
            return Game::with(['round', 'teamHome', 'teamAway', 'bestPlayer', 'firstScorer'])->findOrFail($id);                       
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }

    public function update(Request $request, $id) {
        try {
            $game = Game::findOrFail($id);
            $game->update($request->all());  //dessa forma vai atualizar somente os campos que vieram na req  
            return $game;
        } catch (Exception $e) {
            return response('Not Valid', 400);
        }                         
    }

    public function remove($id) {       
        try {
            $game = Game::findOrFail($id);
            return $game->delete();     
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }
}
