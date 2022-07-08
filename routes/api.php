<?php

use App\Http\Controllers\BetController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RoundController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * rotas acessíveis apenas para usuarios admin
*/
$apiRoutesArr = [];
    
$apiRoutes['route'] = 'teams';
$apiRoutes['controllerClass'] = TeamController::class;
$apiRoutesArr[] = (object) $apiRoutes;

$apiRoutes['route'] = 'players';
$apiRoutes['controllerClass'] = PlayerController::class;
$apiRoutesArr[] = (object) $apiRoutes;

$apiRoutes['route'] = 'rounds';
$apiRoutes['controllerClass'] = RoundController::class;
$apiRoutesArr[] = (object) $apiRoutes;

$apiRoutes['route'] = 'games';
$apiRoutes['controllerClass'] = GameController::class;
$apiRoutesArr[] = (object) $apiRoutes;

$apiRoutes['route'] = 'bets';
$apiRoutes['controllerClass'] = BetController::class;
$apiRoutesArr[] = (object) $apiRoutes;


foreach($apiRoutesArr as $apiRoute) {
    Route::get("/{$apiRoute->route}", [$apiRoute->controllerClass, 'index'])->middleware('isAdmin');
    Route::get("/{$apiRoute->route}/{id}", [$apiRoute->controllerClass, 'show'])->middleware('isAdmin');
    Route::post("/{$apiRoute->route}", [$apiRoute->controllerClass, 'store'])->middleware('isAdmin');
    Route::put("/{$apiRoute->route}/{id}", [$apiRoute->controllerClass, 'update'])->middleware('isAdmin');
    Route::delete("/{$apiRoute->route}/{id}", [$apiRoute->controllerClass, 'remove'])->middleware('isAdmin');   
}




/*
forma comum
Route::get('/teams', [TeamController::class, 'index']);
Route::get('/teams/{id}', [TeamController::class, 'show']);
Route::post('/teams', [TeamController::class, 'store']);
Route::put('/teams/{id}', [TeamController::class, 'update']);
Route::delete('/teams/{id}', [TeamController::class, 'remove']);


Route::get('/players', [PlayerController::class, 'index']);
Route::get('/players/{id}', [PlayerController::class, 'show']);
Route::post('/players', [PlayerController::class, 'store']);
Route::put('/players/{id}', [PlayerController::class, 'update']);
Route::delete('/players/{id}', [PlayerController::class, 'remove']);*/




