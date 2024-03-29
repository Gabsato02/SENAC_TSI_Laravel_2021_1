<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProdutoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */
/* Route::get('/avisos', function() {
    return view('avisos', ['nome'=>'Sato', 
                           'mostrar' => true,
                           'avisos' => [['id' => 1,'texto' => 'Feriados adiantados.'],
                                        ['id' => 2,'texto' => 'Fique em casa!']]
                          ]);
}); */


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'vendas'], function () {
    Route::get('/listar', [VendasController::class, 'listar'])->middleware('auth');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/clientes', ClientesController::class);
    Route::resource('/produtos', ProdutoController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
});