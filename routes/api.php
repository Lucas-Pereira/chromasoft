<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuario', 'getUsuarios');
    Route::post('/usuario', 'criar');
    Route::put('/usuario/{id}', 'atualizar');
    Route::delete('/usuario/{id}', 'deletar');
});