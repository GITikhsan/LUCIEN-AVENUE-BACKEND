<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AdminController,
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
Route::apiResource('product-images', ProductImageController::class);
Route::apiResource('promotions', PromotionController::class);
Route::apiResource('shipments', ShipmentController::class);
Route::apiResource('users', UserController::class);


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
