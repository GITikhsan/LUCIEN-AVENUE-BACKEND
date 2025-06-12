<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --- RUTE PUBLIK (Tidak Perlu Login) ---
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Rute untuk tes koneksi dari frontend (Cukup satu di sini)
Route::get('/ping', function () {
    return response()->json(['message' => 'pong! koneksi berhasil!'], 200);
});


// --- RUTE TERPROTEKSI (Wajib Login) ---
Route::middleware('auth:sanctum')->group(function () {

    // Rute umum untuk user yang sudah login
    Route::get('/user', fn (Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    // Rute yang bisa diakses user biasa
    Route::apiResource('orders', OrderController::class);

    // Rute yang hanya bisa diakses admin (diatur oleh Policy)
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::post('/products/{product}/upload-image', [ProductController::class, 'uploadImage']);

    // Rute untuk mengelola semua user (contoh, bisa diatur oleh UserPolicy nanti)
    Route::apiResource('users', UserController::class);
    Route::get('/ping', function () {
    return response()->json(['message' => 'pong! koneksi sukses!'], 200);
});

});