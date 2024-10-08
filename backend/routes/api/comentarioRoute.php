<?php

use App\Http\Controllers\api\comentarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('comentario')->group(function () {
    Route::post('/post', [comentarioController::class, 'crear']);
    Route::put('/put/{id}', [comentarioController::class, 'actualizarId']);
    Route::delete('/delete/{id}', [comentarioController::class, 'eliminarId']);
    Route::get('/get-all', [comentarioController::class, 'listarTodo']);
    Route::get('/get-one/{id}', [comentarioController::class, 'listarId']);
    Route::get('/get-comentario-usuario/{usuarioId}', [comentarioController::class, 'getComentarioOne']);
    Route::get('/get-comentario-all', [comentarioController::class, 'getComentarioAll']);
});