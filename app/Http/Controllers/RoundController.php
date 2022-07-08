<?php

namespace App\Http\Controllers;

use ApiControllerInterface;
use App\Models\Round;
use Exception;
use Illuminate\Http\Request;

class RoundController extends Controller 
{
    public function index() {
        return Round::all();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required']            
        ]);
        $data = $request->all();
        return Round::create($data);
    }

    public function show($id) {
        try {
            return Round::findOrFail($id);                       
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }

    public function update(Request $request, $id) {
        try {
            $round = Round::findOrFail($id);
            $round->update($request->all());  //dessa forma vai atualizar somente os campos que vieram na req  
            return $round;
        } catch (Exception $e) {
            return response('Not Valid', 400);
        }                         
    }

    public function remove($id) {       
        try {
            $round = Round::findOrFail($id);
            return $round->delete();     
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }
}
