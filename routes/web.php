<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\TelefoneController;
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

Route::resource('contato', ContatoController::class)->middleware('auth');
Route::resource('contato.telefone', TelefoneController::class)->middleware('auth');
Route::resource('contato.endereco', EnderecoController::class)->middleware('auth');

Auth::routes();


//Datatables
Route::get('/contato-beta', [ContatoController::class, 'index_beta'])->middleware('auth')->name('contato.index_beta');
Route::get('/contato-code', [ContatoController::class, 'index_code'])->middleware('auth')->name('contato.index_code');
Route::get('/copntato_datatable', [ContatoController::class, 'datatable'])->middleware('auth')->name('contato.datatable');