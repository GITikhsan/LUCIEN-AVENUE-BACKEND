<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
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
    return view('jordan/4,240'); 
});



