<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// Route::apiResource('role', RoleController::class);


Route::middleware(['auth:sanctum', 'role:superadmin'])->group(function () {
    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
    });
});


// auth routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});
