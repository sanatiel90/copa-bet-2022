<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use Exception;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function index() {
        return Bet::with(['user', 'game', 'bestPlayer', 'firstScorer'])->get();
    }

    public function store(Request $request) {
        $request->validate([
            'game_id' => ['required', 'numeric'],
            'best_player_id' => ['required', 'numeric'],
            'first_scorer_id' => ['required', 'numeric'],
            'goals_team_home' => ['required', 'numeric'],
            'goals_team_away' => ['required', 'numeric'],
            'confirmed' => ['boolean']          
        ]);
        $data = $request->all();
        return Bet::create($data);
    }

    public function show($id) {
        try {
            return Bet::with(['user', 'game', 'bestPlayer', 'firstScorer'])->findOrFail($id);                       
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }

    public function update(Request $request, $id) {
        try {
            $bet = Bet::findOrFail($id);
            $bet->update($request->all());  //dessa forma vai atualizar somente os campos que vieram na req  
            return $bet;
        } catch (Exception $e) {
            return response('Not Valid', 400);
        }                         
    }

    public function remove($id) {       
        try {
            $bet = Bet::findOrFail($id);
            return $bet->delete();     
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }
}
