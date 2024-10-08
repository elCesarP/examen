<?php

use App\Http\Controllers\api\reservaController;
use Illuminate\Support\Facades\Route;

Route::prefix('reserva')->group(function () {
    Route::post('/post', [reservaController::class, 'crear']);
    Route::put('/put/{id}', [reservaController::class, 'actualizarId']);
    Route::delete('/delete/{id}', [reservaController::class, 'eliminarId']);
    Route::get('/get-all', [reservaController::class, 'listarTodo']);
    Route::get('/get-one/{id}', [reservaController::class, 'listarId']);
    Route::get('/get-reserva-all', [reservaController::class, 'getReservaAll']);
    Route::get('/get-reserva-usuario/{usuarioId}', [reservaController::class, 'getReservaOne']);
    Route::post('/post-reserva-usuario', [reservaController::class, 'createReserva']);
});