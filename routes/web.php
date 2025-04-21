<?php

use Illuminate\Support\Facades\Route;

Route::get('/aboutus', function () {
    return view('layout.aboutus');
});
Route::get('/fashion', function () {
    return view('layout.fashion');
});
Route::get('/test', function () {
    return view('layout.test');
});
Route::get('/4_240', function () {
    return view('layout.jordan.4_240'); 
});



