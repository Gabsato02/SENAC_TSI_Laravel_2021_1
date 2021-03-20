<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvisoController;
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

Route::resource('/', AvisoController::class);