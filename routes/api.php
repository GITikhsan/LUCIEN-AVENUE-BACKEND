<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Dashboard\ProfileController;




Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| File ini diatur menjadi dua bagian utama:
| 1. Rute Publik: Bisa diakses oleh siapa saja.
| 2. Rute Terproteksi: Wajib login untuk mengakses, hak akses diatur oleh Policy.
|
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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Siapa saja boleh melihat daftar produk dan detailnya
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Siapa saja boleh melihat daftar diskon
// Siapa saja boleh melihat daftar diskon
Route::get('/discounts', [DiscountController::class, 'index']);

Route::get('/ping', function () {
    return response()->json(['message' => 'pong! koneksi berhasil!'], 200);
});


// =========================================================================
// RUTE TERPROTEKSI (WAJIB LOGIN)
// =========================================================================
Route::middleware('auth:sanctum')->group(function () {

    // Rute umum untuk user yang sedang login
    // Rute umum untuk user yang sedang login
    Route::get('/user', fn (Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    // --- Rute yang bisa diakses user biasa ---
    Route::apiResource('orders', OrderController::class);
    // ...tambahkan rute lain untuk user di sini...
    // ...tambahkan rute lain untuk user di sini...

    // --- Rute yang HANYA bisa diakses ADMIN (diatur oleh Policy) ---
    // Rute untuk membuat, mengupdate, dan menghapus produk
    // Route::post('/products', [ProductController::class, 'store']);
    // Route::put('/products/{product}', [ProductController::class, 'update']);
    // Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    // Route::post('/products/{product}/upload-image', [ProductController::class, 'uploadImage']);


    Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);            // Ambil semua produk
    Route::post('/', [ProductController::class, 'store']);           // Tambah produk baru
    Route::get('/{product}', [ProductController::class, 'show']);    // Detail produk
    Route::put('/{product}', [ProductController::class, 'update']);  // Update produk
    Route::delete('/{product}', [ProductController::class, 'destroy']); // Hapus produk

    // Upload gambar (jika ada fitur upload walaupun kolom `image` tidak digunakan)
    Route::post('/{product}/upload-image', [ProductController::class, 'uploadImage']);
    });

    // Rute untuk membuat, mengupdate, dan menghapus diskon
    Route::apiResource('discounts', DiscountController::class)->except(['index']);
    Route::apiResource('discounts', DiscountController::class)->except(['index']);

    // PERBAIKAN: Rute untuk mengelola user, KECUALI untuk membuat user (store)
    // karena sudah kita pindahkan ke bagian Rute Publik di atas.
    // Route::apiResource('users', UserController::class)->except(['store']);

    // Route::get('/profile', [ProfileController::class, 'profile']);


});



