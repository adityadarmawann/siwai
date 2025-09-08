<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JabatanController;
use App\Http\Controllers\Api\SkpdController;
use App\Http\Controllers\Api\UnitKerjaController;
use App\Http\Controllers\Api\PegawaiController;

// Route Autentikasi
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Resource Routes dengan Bearer Token
    Route::apiResource('jabatan', JabatanController::class);
    Route::apiResource('skpd', SkpdController::class);
    Route::apiResource('unit-kerja', UnitKerjaController::class);
    Route::apiResource('pegawai', PegawaiController::class);
});