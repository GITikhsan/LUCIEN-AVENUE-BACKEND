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
use App\Http\Controllers\Api\PromotionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// =========================================================================
// OPERASI PAKSA JAWAB
// =========================================================================
// Rute asli diberi komentar.
Route::get('/wilayah/provinsi', [WilayahController::class, 'getProvinces']); 
// [FIXED] Nama method diubah dari 'getRegencies' menjadi 'getCities' agar sesuai dengan Controller yang baru
Route::get('/wilayah/kota/{provinceId}', [WilayahController::class, 'getCities']);
Route::get('/wilayah/kecamatan/{regencyId}', [WilayahController::class, 'getDistricts']);
Route::get('/wilayah/desa/{districtId}', [WilayahController::class, 'getVillages']);

// Rute tes sederhana untuk /wilayah/provinsi
// Route::get('/wilayah/provinsi', function () {
//     return response()->json(['message' => 'AKHIRNYA BISA! Rute ini sekarang berfungsi!']);
// });
// =========================================================================


// Rute Publik Lainnya
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/ping', function() {
    return response()->json(['message' => 'pong! API is ready.']);
});

// Rute Terproteksi (Wajib Login)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Profil & Alamat
    Route::get('/user', [ProfileController::class, 'getProfile']);
    Route::post('/profile/update', [ProfileController::class, 'updateField']);
    Route::post('/address', [ProfileController::class, 'updateAddress']);
    Route::get('/checkout/address', [ProfileController::class, 'getShippingAddress']);

    // ... sisa rute lainnya ...
    Route::apiResource('orders', OrderController::class);
    Route::get('/checkout/summary', [OrderController::class, 'getSummaryForCheckout']);
    Route::apiResource('carts', CartController::class);
    Route::apiResource('order-items', OrderItemController::class)->only(['index', 'show']);
    Route::apiResource('users', UserController::class);
    Route::apiResource('discounts', DiscountController::class);
    Route::apiResource('promotions', PromotionController::class);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::post('/products/{product}/upload-image', [ProductController::class, 'uploadImage']);
    Route::apiResource('product-images', ProductImageController::class)->except(['create', 'edit', 'update']);
});
