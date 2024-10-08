<?php

use App\Http\Controllers\api\authController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [authController::class, 'login'])->name('login');
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
});
