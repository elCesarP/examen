<?php

use App\Http\Controllers\api\rolController;
use Illuminate\Support\Facades\Route;

Route::prefix('rol')->group(function () {
    Route::post('/post', [rolController::class, 'crear']);
    Route::put('/put/{id}', [rolController::class, 'actualizarId']);
    Route::delete('/delete/{id}', [rolController::class, 'eliminarId']);
    Route::get('/get-all', [rolController::class, 'listarTodo']);
    Route::get('/get-one/{id}', [rolController::class, 'listarId']);
});