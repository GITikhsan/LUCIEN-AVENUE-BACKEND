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
use App\Http\Controllers\Api\DashboardController;

use App\Http\Controllers\Api\PaymentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// =========================================================================
// WILAYAH ROUTES
// =========================================================================
// Gunakan controller method untuk provinces (hapus route debug)
Route::prefix('wilayah')->group(function () {
    Route::get('/provinsi', [WilayahController::class, 'provinsi']);
    Route::get('/provinsi/search', [WilayahController::class, 'searchProvinsi']);
    Route::get('/kabupaten/{provinsi_id}', [WilayahController::class, 'kabupaten']);
    Route::get('/kecamatan/{kabupaten_id}', [WilayahController::class, 'kecamatan']);
    Route::get('/kelurahan/{kecamatan_id}', [WilayahController::class, 'kelurahan']);
    Route::get('/all/{provinsi_id?}/{kabupaten_id?}/{kecamatan_id?}', [WilayahController::class, 'getAllData']);
});

// Rute publik
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/search', [ProductController::class, 'search']);
Route::get('/products/filter', [FilterController::class, 'filter']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/ping', fn () => response()->json(['message' => 'pong! API is ready.']));
Route::post('/payment/callback', [PaymentController::class, 'callback']);
Route::get('/dashboard/summary', [DashboardController::class, 'summary']);


// Rute yang dilindungi dengan Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Auth & Profil
    Route::get('/user', [ProfileController::class, 'getProfile']);
    Route::post('/profile/update', [ProfileController::class, 'updateField']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::delete('/user/delete', [ProfileController::class, 'destroy']);

    // Orders & Items
    Route::apiResource('orders', OrderController::class);
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancelOrder']);
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

    //Payment(midtrans)
    Route::middleware('auth:sanctum')->post('/payment', [PaymentController::class, 'makePayment']);

    Route::middleware('auth:sanctum')->get('/checkout/address', [ProfileController::class, 'getShippingAddress']);

     // Checkout
    Route::get('/checkout/summary', [OrderController::class, 'getSummaryForCheckout']);
    Route::get('/checkout/address', [ProfileController::class, 'getShippingAddress']);

    // =================================================================
    // TAMBAHKAN BARIS INI (Penyebab error 404)
    // =================================================================
    Route::post('/order/create-from-cart', [OrderController::class, 'storeOrderFromCart']);
    // =================================================================


    Route::get('/admin/orders', [OrderController::class, 'getAllOrdersForAdmin'])->middleware('auth:sanctum');
    Route::get('/customers', [UserController::class, 'getCustomer']);
});
