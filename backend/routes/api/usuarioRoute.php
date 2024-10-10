<?php

use App\Http\Controllers\api\usuarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('usuario')->group(function () {
    Route::middleware('auth:sanctum')->group(function(){
        Route::put('/put/{id}', [usuarioController::class, 'actualizarId']);
        Route::delete('/delete/{id}', [usuarioController::class, 'eliminarId']);
        Route::get('/get-one/{id}', [usuarioController::class, 'listarId']);
        Route::get('/get-usuario-rol/{rolId}', [usuarioController::class, 'getUsuarioOne']);
        Route::get('/get-usuario-all', [usuarioController::class, 'getUsuarioAll']);
    });
    //ruta publica para crear usuarios
    Route::post('/post', [usuarioController::class, 'crear']);
    Route::get('/get-all', [usuarioController::class, 'listarTodo']);
});
