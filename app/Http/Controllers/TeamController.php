<?php

namespace App\Http\Controllers;

use ApiControllerInterface;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;

class TeamController extends Controller 
{
    public function index() {
        return Team::with('players')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'short_name' => ['required', 'max:3'],
            'picture_url' => ['required']
        ]);
        $data = $request->all();
        return Team::create($data);
    }

    public function show($id) {        
        
        try {
            return Team::with('players')->findOrFail($id);
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }

    public function update(Request $request, $id) {
        try {
            $team = Team::findOrFail($id);
            $team->update($request->all());  //dessa forma vai atualizar somente os campos que vieram na req  
            return $team;
        } catch (Exception $e) {
            return response('Not Valid', 400);
        }                         
    }

    public function remove($id) {       
        try {
            $team = Team::findOrFail($id);
            return $team->delete();     
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }
}
