<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DiscountController;
// ... Impor controller lain yang Anda butuhkan ...

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| File ini sekarang diatur menjadi dua bagian utama:
| 1. Rute Publik: Bisa diakses oleh siapa saja.
| 2. Rute Terproteksi: Wajib login untuk mengakses.
|
*/

// =========================================================================
// RUTE PUBLIK (TIDAK PERLU LOGIN)
// =========================================================================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Siapa saja boleh melihat daftar produk dan detailnya
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Siapa saja boleh melihat daftar diskon (jika diperlukan)
Route::get('/discounts', [DiscountController::class, 'index']);


// =========================================================================
// RUTE TERPROTEKSI (WAJIB LOGIN)
// =========================================================================
Route::middleware('auth:sanctum')->group(function () {

    // Rute umum untuk user yang sudah login
    Route::get('/user', fn (Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    // --- Rute yang bisa diakses user biasa ---
    Route::apiResource('orders', OrderController::class);
    // ...tambahkan rute lain untuk user di sini

    // --- Rute yang HANYA bisa diakses ADMIN (diatur oleh Policy) ---
    // Rute untuk membuat, mengupdate, dan menghapus produk
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::post('/products/{product}/upload-image', [ProductController::class, 'uploadImage']);

    // Rute untuk membuat, mengupdate, dan menghapus diskon
    Route::post('/discounts', [DiscountController::class, 'store']);
    Route::put('/discounts/{discount}', [DiscountController::class, 'update']);
    Route::delete('/discounts/{discount}', [DiscountController::class, 'destroy']);

    // Rute untuk mengelola semua user
    Route::apiResource('users', UserController::class);
});
