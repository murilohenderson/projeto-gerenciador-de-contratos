<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ContratoInfoController;
use App\Http\Middleware\Autenticador;

Route::get('/', function () {
    return view('welcome');
})->middleware(Autenticador::class);

Route::resource('/contratos', ContratosController::class)->except('show');
Route::resource('/usuarios', UsuariosController::class);
Route::get('/contratos/{contrato}/informacoes', [ContratoInfoController::class, 'index'])->name('contratosinfo.index');