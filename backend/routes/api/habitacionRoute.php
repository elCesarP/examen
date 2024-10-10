<?php

use App\Http\Controllers\api\habitacionController;
use Illuminate\Support\Facades\Route;

Route::prefix('habitacion')->group(function () {
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/post', [habitacionController::class, 'crear']);
        Route::put('/put/{id}', [habitacionController::class, 'actualizarId']);
        Route::delete('/delete/{id}', [habitacionController::class, 'eliminarId']);
        Route::get('/get-all', [habitacionController::class, 'listarTodo']);
        Route::get('/get-one/{id}', [habitacionController::class, 'listarId']);
    });
});
