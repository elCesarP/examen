<?php

use App\Http\Controllers\api\authController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [authController::class, 'login'])->name('login');
    Route::post('/logout', [authController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
    Route::get('/perfil', [authController::class, 'perfil'])->name('perfil');
    Route::put('/perfil', [authController::class, 'actualizarPerfil'])->name('actualizarPerfil');
});
