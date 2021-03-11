<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* Passo 1: criando uma view para a visualização de produtos.
Ao acessar product, será feita uma requisição get que retornará uma view.

Passo 1.1: A função que antes retornava um get, foi substituída pelo acesso a classe de Controller que agora retorna a view

ESTRUTURA: Rota::requisição(nome_da_view, [Classe::class, nome_da_classe])->name(nome_da_rota);
*/

Route::resource('/category', CategoriesController::class)->middleware(['auth']);
Route::resource('/product', ProductsController::class)->middleware(['auth']);
Route::resource('/tag', TagController::class)->middleware(['auth']);