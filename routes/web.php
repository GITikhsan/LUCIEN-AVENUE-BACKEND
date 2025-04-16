<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('aboutus');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});

