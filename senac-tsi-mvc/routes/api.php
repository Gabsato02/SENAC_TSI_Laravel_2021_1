<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\APIController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth.jwt', 'prefix' => 'v1'], function() {
    Route::get('/funcionarios', [FuncionarioController::class, 'index']);
    Route::post('/funcionarios', [FuncionarioController::class, 'store']);
    Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy']);
    Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show']);
    Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update']);
});

Route::group(['middleware' => 'auth.jwt', 'prefix' => 'v2'], function() {
    Route::get('/fabricantes', [FabricanteController::class, 'index']);
    Route::post('/fabricantes', [FabricanteController::class, 'store']);
    Route::delete('/fabricantes/{id}', [FabricanteController::class, 'destroy']);
    Route::get('/fabricantes/{id}', [FabricanteController::class, 'show']);
    Route::put('/fabricantes/{id}', [FabricanteController::class, 'update']);
});

Route::post('/login', [APIController::class, 'login']);
Route::get('/logout', [APIController::class, 'logout']);
