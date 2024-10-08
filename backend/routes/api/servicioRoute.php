<?php

use App\Http\Controllers\api\servicioController;
use Illuminate\Support\Facades\Route;

Route::prefix('servicio')->group(function () {
    Route::post('/post', [servicioController::class, 'crear']);
    Route::put('/put/{id}', [servicioController::class, 'actualizarId']);
    Route::delete('/delete/{id}', [servicioController::class, 'eliminarId']);
    Route::get('/get-all', [servicioController::class, 'listarTodo']);
    Route::get('/get-one/{id}', [servicioController::class, 'listarId']);
    Route::get('/get-servicio-usuario/{usuarioId}', [servicioController::class, 'getServicioOne']);
    Route::get('/get-servicio-all', [servicioController::class, 'getServicioAll']);
});