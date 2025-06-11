<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AdminController,
    AuthController,
    CartController,
    DiscountController,
    ManagementController,
    OrderController,
    OrderItemController,
    OrderReturnController,
    PaymentController,
    ProductController,
    ProductImageController,
    PromotionController,
    ShipmentController,
    UserController
};

Route::apiResource('admins', AdminController::class);
Route::apiResource('carts', CartController::class);
Route::apiResource('discounts', DiscountController::class);
Route::apiResource('managements', ManagementController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('order-items', OrderItemController::class);
Route::apiResource('order-returns', OrderReturnController::class);
Route::apiResource('payments', PaymentController::class);
Route::apiResource('products', ProductController::class);
// Rute ini bisa diletakkan di dalam grup middleware admin nanti
Route::post('/products/{product}/upload-image', [ProductController::class, 'uploadImage']);

Route::apiResource('product-images', ProductImageController::class);
Route::apiResource('promotions', PromotionController::class);
Route::apiResource('shipments', ShipmentController::class);
Route::apiResource('users', UserController::class);

// --- Rute Publik (tidak perlu login) ---
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);


// --- Rute Terproteksi (WAJIB login) ---
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn (Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/debug-user', function (Request $request) {
        return $request->user();
    });
    // Rute yang butuh login
    Route::apiResource('orders', OrderController::class);
    // ...tambahkan rute terproteksi lainnya di sini
});

Route::get('/ping', function () {
    return response()->json([
        'message' => 'pong',
        'status' => 'success'
    ]);
});

Route::post('/greet', function (Request $request) {
    $name = $request->input('name');
    return response()->json([
        'message' => "Hello, $name!",
        'status' => 'success'
    ]);
});

Route::get('/hello', function () {
    return response()->json(['message' => 'Hello from Laravel!']);
});

// Authentication User
// Public routes for authentication
Route::post('/login', [UserController::class, 'login']);
Route::post('/users', [UserController::class, 'store']); // For registration

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // You can add other user-related routes here
    Route::apiResource('users', UserController::class)->except(['store']);
});
