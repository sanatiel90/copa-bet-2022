<?php

namespace App\Http\Controllers;

use ApiControllerInterface;
use App\Models\Player;
use Exception;
use Illuminate\Http\Request;

class PlayerController extends Controller 
{
    public function index() {
        return Player::all();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'team_id' => ['required', 'numeric']            
        ]);
        $data = $request->all();
        return Player::create($data);
    }

    public function show($id) {
        try {
            return Player::findOrFail($id); 
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }

    public function update(Request $request, $id) {
        try {
            $player = Player::findOrFail($id);
            $player->update($request->all());  //dessa forma vai atualizar somente os campos que vieram na req  
            return $player;
        } catch (Exception $e) {
            return response('Not Valid', 400);
        }                         
    }

    public function remove($id) {       
        try {
            $player = Player::findOrFail($id);
            return $player->delete();     
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }
}
