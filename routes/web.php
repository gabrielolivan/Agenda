<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\GrupoContatoController;
use App\Http\Controllers\TelefoneController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function(){
    Route::view('/', 'home')->name('home');
    //Contato
    Route::group(['prefix' => 'contato'], function(){
        Route::get('datatable', [ContatoController::class, 'datatable'])->name('contato.datatable');
        Route::get('contato_beta', [ContatoController::class, 'index_beta'])->name('contato.index_beta');
        Route::get('contato_code', [ContatoController::class, 'index_code'])->name('contato.index_code');
    });
    Route::resource('contato', ContatoController::class);
    Route::resource('contato.endereco', EnderecoController::class);
    Route::resource('contato.telefone', TelefoneController::class);
    
    
    //Grupo Contato
    Route::group(['prefix' => 'grupo_contato'], function(){
        Route::get('datatable', [GrupoContatoController::class, 'datatable'])->name('grupo_contato.datatable');
        Route::get('select2', [GrupoContatoController::class, 'select_grupo'])->name('grupo_contato.select2');
        Route::get('create_select', [GrupoContatoController::class, 'create_select'])->name('grupo_contato.select');
    });
    Route::resource('grupo_contato', GrupoContatoController::class);
});

Auth::routes();
