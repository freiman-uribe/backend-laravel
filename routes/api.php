<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\AuthController;
use App\Interfaces\Http\Controllers\MateriaController;
use App\Interfaces\Http\Controllers\DocenteController;

Route::prefix('')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('materias', MateriaController::class);
        Route::apiResource('docentes', DocenteController::class);
        Route::post('docentes/{id}/materias', [DocenteController::class, 'assignMaterias']);
        Route::get('docente/materias', [DocenteController::class, 'getMaterias']);
    });
});

Route::get('/', function () {
    return response()->json(['message' => 'Bienvenido']);
});
