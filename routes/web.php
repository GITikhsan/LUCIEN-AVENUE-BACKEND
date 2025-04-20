<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/aboutus', function () {
    return view('aboutus'); // pastikan ada file resources/views/aboutus.blade.php
});

Route::get('/fashion', function () {
    return view('fashion'); // pastikan ada file resources/views/aboutus.blade.php
});
Route::get('/test', function () {
    return view('test'); // pastikan ada file resources/views/aboutus.blade.php
});

Route::get('/4,240', function () {
    return view('jordan/4,240'); // pastikan ada file resources/views/aboutus.blade.php
});

Route::get('/header', function () {
    return view('header'); // pastikan ada file resources/views/aboutus.blade.php
});



