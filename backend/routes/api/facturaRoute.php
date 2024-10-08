<?php

use App\Http\Controllers\api\facturaController;
use Illuminate\Support\Facades\Route;

Route::prefix('factura')->group(function () {
    Route::post('/post', [facturaController::class, 'crear']);
    Route::put('/put/{id}', [facturaController::class, 'actualizarId']);
    Route::delete('/delete/{id}', [facturaController::class, 'eliminarId']);
    Route::get('/get-all', [facturaController::class, 'listarTodo']);
    Route::get('/get-one/{id}', [facturaController::class, 'listarId']);
    Route::get('/get-factura-usuario/{usuarioId}', [facturaController::class, 'getFacturaOne']);
    Route::get('/get-factura-all', [facturaController::class, 'getFacturaAll']);
});