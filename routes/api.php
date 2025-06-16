<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductImageController;
use App\Http\Controllers\Api\WilayahController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rute Wilayah
Route::get('/wilayah/provinsi', [WilayahController::class, 'getProvinces']);
Route::get('/wilayah/kota/{provinceId}', [WilayahController::class, 'getRegencies']);
Route::get('/wilayah/kecamatan/{regencyId}', [WilayahController::class, 'getDistricts']);
Route::get('/wilayah/desa/{districtId}', [WilayahController::class, 'getVillages']);

// =========================================================================
// RUTE PUBLIK (TIDAK PERLU LOGIN)
// =========================================================================

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);      // Melihat semua produk
Route::get('/products/{product}', [ProductController::class, 'show']); // Melihat detail produk
Route::post('/address', [ProfileController::class, 'updateAddress']);
Route::get('/ping', function() {
    return response()->json(['message' => 'pong! API is ready.']);
});

// =========================================================================
// RUTE TERPROTEKSI (WAJIB LOGIN DENGAN TOKEN)
// =========================================================================
Route::middleware('auth:sanctum')->group(function () {

    // Profil User yang sedang Login
    Route::get('/user', [ProfileController::class, 'getProfile']);
    Route::post('/profile/update', [ProfileController::class, 'updateField']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('orders', OrderController::class);

    // Manajemen User (Hanya bisa diakses oleh user dengan hak akses, misal: Admin)
    Route::apiResource('users', UserController::class);

    // Manajemen Produk (Hanya bisa diakses oleh user dengan hak akses, misal: Admin)
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::post('/products/{product}/upload-image', [ProductController::class, 'uploadImage']);

    // Manajemen Diskon (Hanya bisa diakses oleh user dengan hak akses, misal: Admin)
    Route::apiResource('discounts', DiscountController::class);
    // Tambahkan rute terproteksi lainnya di sini (orders, products, etc.)
    // ...
    Route::apiResource('order-items', OrderItemController::class)->only(['index', 'show']);
    Route::apiResource('carts', CartController::class);
    Route::apiResource('product-images', ProductImageController::class)->except(['create', 'edit', 'update']);

});
