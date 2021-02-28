<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

/* Passo 1: criando uma view para a visualização de produtos.
Ao acessar product, será feita uma requisição get que retornará uma view.

Passo 1.1: A função que antes retornava um get, foi substituída pelo acesso a classe de Controller que agora retorna a view

ESTRUTURA: Rota::requisição(nome_da_view, [Classe::class, nome_da_classe])->name(nome_da_rota);
*/
Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store');
// Para edição, é passado o nome da model que tem a estrutura dos dados que se deseja editar
Route::get('/product/edit/{product}', [ProductsController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{product}', [ProductsController::class, 'update'])->name('product.update');
Route::get('/product/destroy/{product}', [ProductsController::class, 'destroy'])->name('product.destroy');