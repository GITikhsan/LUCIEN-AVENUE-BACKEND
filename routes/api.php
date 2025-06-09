<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return response()->json([
        'message' => 'Halo dari /api/hello!',
        'status' => 'success'
    ]);
});
