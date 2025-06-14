<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DiscountController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| File ini diatur menjadi dua bagian utama:
| 1. Rute Publik: Bisa diakses oleh siapa saja.
| 2. Rute Terproteksi: Wajib login untuk mengakses, hak akses diatur oleh Policy.
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

// Siapa saja boleh melihat daftar diskon
Route::get('/discounts', [DiscountController::class, 'index']);


// =========================================================================
// RUTE TERPROTEKSI (WAJIB LOGIN)
// =========================================================================
Route::middleware('auth:sanctum')->group(function () {

    // Rute umum untuk user yang sedang login
    Route::get('/user', fn (Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    // --- Rute yang bisa diakses user biasa ---
    Route::apiResource('orders', OrderController::class);
    // ...tambahkan rute lain untuk user di sini...

    // --- Rute yang HANYA bisa diakses ADMIN (diatur oleh Policy) ---
    // Rute untuk membuat, mengupdate, dan menghapus produk
    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/products/{product}/upload-image', [ProductController::class, 'uploadImage']);
    // Untuk update, kita gunakan POST dengan _method: 'PUT' dari form-data, atau langsung PUT jika frontend mendukung
    Route::match(['PUT', 'PATCH'], '/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    // Rute untuk membuat, mengupdate, dan menghapus diskon
    Route::apiResource('discounts', DiscountController::class)->except(['index']);

    // Rute untuk mengelola semua user
    Route::apiResource('users', UserController::class);
});
