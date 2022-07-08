<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class BaseController extends Controller {

    protected $model;

    public function __construct($model) {
        $this-> model = $model;
    }

    public function index() {
        return $this->model->all();
    }

    public function store(Request $request) {
        /*$request->validate([
            'name' => ['required'],
            'short_name' => ['required', 'max:3'],
            'picture_url' => ['required']
        ]);*/
        $data = $request->all();
        return $this->model::create($data);
    }

    public function show($id) {
        try {
            return $this->model::findOrFail($id);
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }

    public function update(Request $request, $id) {
        try {
            $modelInstance = $this->model::findOrFail($id);
            $modelInstance->update($request->all());  //dessa forma vai atualizar somente os campos que vieram na req  
            return $modelInstance;
        } catch (Exception $e) {
            return response('Not Valid', 400);
        }                         
    }

    public function remove($id) {       
        try {
            $modelInstance = $this->model::findOrFail($id);
            return $modelInstance->delete();     
        } catch (Exception $e) {
            return response('Not Found', 404);
        }
    }
}