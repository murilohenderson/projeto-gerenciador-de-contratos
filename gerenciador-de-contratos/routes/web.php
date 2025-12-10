<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\UsuariosController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/contratos', ContratosController::class)->except('show');
Route::resource('/usuarios', UsuariosController::class);
