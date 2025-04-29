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
Route::get('/4,240', function () {
    return view('layout.jordan.4,240');
});
Route::get('/profile', function () {
    return view('layout.profile');
});
Route::get('/license', function () {
    return view('layout.license');
});
Route::get('/login', function () {
    return view('layout.login');
});
Route::get('/register', function () {
    return view('layout.register');
});
Route::get('/forgot', function () {
    return view('layout.forgot');
});
Route::get('/homePage', function () {
    return view('layout.homePage');
});
Route::get('/22,000', function () {
    return view('layout.jordan.22,000');
});
Route::get('/7,950', function () {
    return view('layout.jordan.7,950');
});
Route::get('/15,700', function () {
    return view('layout.jordan.15,700');
});
Route::get('/5,790', function () {
    return view('layout.jordan.5,790');
});
