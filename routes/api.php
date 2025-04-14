<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HistoriController;

Route::post('/kembalikan', [HistoriController::class, 'kembalikanBarang']);

Route::get('/histori/{nim}', [HistoriController::class, 'getHistori']);

Route::post('/checkout', [CheckoutController::class, 'checkout']);

Route::get('/barangs', [BarangController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/tes-api', function () {
    return response()->json(['message' => 'Tes API jalan']);
});
