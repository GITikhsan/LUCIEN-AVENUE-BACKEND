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
use App\Http\Controllers\Api\FilterController;

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

// Rute publik
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/ping', fn () => response()->json(['message' => 'pong! API is ready.']));

// Rute yang dilindungi dengan Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Auth & Profil
    Route::get('/user', [ProfileController::class, 'getProfile']);
    Route::post('/profile/update', [ProfileController::class, 'updateField']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Orders & Items
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('order-items', OrderItemController::class)->only(['index', 'show']);

    // User Management
    Route::apiResource('users', UserController::class);

    // Products
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::post('/products/{product}/upload-image', [ProductController::class, 'uploadImage']);

    // Discount
    Route::apiResource('discounts', DiscountController::class);

    // Product Images
    Route::apiResource('product-images', ProductImageController::class)->except(['create', 'edit', 'update']);

    // Promotion
    Route::apiResource('promotions', PromotionController::class);
    Route::post('/promotions/apply-coupon', [PromotionController::class, 'applyCoupon']);

    // Checkout
    Route::get('/checkout/summary', [OrderController::class, 'getSummaryForCheckout']);
    Route::get('/checkout/address', [ProfileController::class, 'getShippingAddress']);
    Route::post('/address', [ProfileController::class, 'updateAddress']);

    // Cart
    Route::apiResource('carts', CartController::class);
    // ... route-route lain yang butuh login

});

Route::get('/products/filter', [FilterController::class, 'filter']);

