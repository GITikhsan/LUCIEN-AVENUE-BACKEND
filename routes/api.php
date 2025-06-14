<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Dashboard\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Rute dibagi menjadi dua: Publik (tanpa login) dan Terproteksi (wajib login).
*/

// =========================================================================
// RUTE PUBLIK (TIDAK PERLU LOGIN)
// =========================================================================

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// PING untuk cek koneksi
Route::get('/ping', function () {
    return response()->json(['message' => 'pong! koneksi berhasil!'], 200);
});

// Siapa saja boleh MELIHAT daftar produk dan detailnya
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Siapa saja boleh MELIHAT daftar diskon
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

    // Rute untuk MEMBUAT, MENGUPDATE, dan MENGHAPUS produk
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']); // Bisa juga pakai POST untuk update jika frontend lebih mudah
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    // Rute untuk MEMBUAT, MENGUPDATE, dan MENGHAPUS diskon
    // (menggunakan `except` untuk menghindari duplikasi dengan route 'index' publik)
    Route::apiResource('discounts', DiscountController::class)->except(['index', 'show']);

});
