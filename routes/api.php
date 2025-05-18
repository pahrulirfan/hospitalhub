<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\DokterController;
use App\Http\Controllers\Api\RumahSakitController;
use App\Http\Controllers\Api\SpesialisasiController;
use App\Http\Controllers\Api\RsDokterController;

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('dokter', DokterController::class);
    Route::apiResource('rumah-sakit', RumahSakitController::class);
    Route::apiResource('spesialisasi', SpesialisasiController::class);
    Route::apiResource('praktek', RsDokterController::class);

    Route::post('/logout', [LoginController::class, 'logout']);
});
