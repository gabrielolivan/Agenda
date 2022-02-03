<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\GrupoContatoController;
use App\Http\Controllers\TelefoneController;
use App\Models\GrupoContato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
    return redirect('contato');
})->name('home');


//Contato
Route::get('/contato/datatable', [ContatoController::class, 'datatable'])->middleware('auth')->name('contato.datatable');
Route::get('/contato_beta', [ContatoController::class, 'index_beta'])->middleware('auth')->name('contato.index_beta');
Route::get('/contato_code', [ContatoController::class, 'index_code'])->middleware('auth')->name('contato.index_code');
Route::resource('contato', ContatoController::class)->middleware('auth');
Route::resource('contato.telefone', TelefoneController::class)->middleware('auth');
Route::resource('contato.endereco', EnderecoController::class)->middleware('auth');

//Grupo Contato
Route::get('/grupo_contato/datatable', [GrupoContatoController::class, 'datatable'])->middleware('auth')->name('grupo_contato.datatable');
Route::get('/grupo_contato_select2', [GrupoContatoController::class, 'select_grupo'])->middleware('auth')->name('grupo_contato.select2');
Route::get('/grupo_contato/create_select', [GrupoContatoController::class, 'create_select'])->middleware('auth')->name('grupo_contato.select');
Route::resource('grupo_contato', GrupoContatoController::class)->middleware('auth');



Auth::routes();
