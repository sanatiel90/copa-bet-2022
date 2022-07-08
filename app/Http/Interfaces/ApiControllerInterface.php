<?php

use Illuminate\Http\Request;

interface ApiControllerInterface {
    public function index();
    public function store(Request $request);
    public function show($id);
    public function update(Request $request, $id);
    public function remove($id);
}