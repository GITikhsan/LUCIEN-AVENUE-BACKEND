<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*         ADMIN       */
Route::get('/admin', function () {
    return view('admin.admin');
});
/*         ADMIN       */





/*         USER       */
Route::get('/aboutus', function () {
    return view('user.aboutus');
});
Route::get('/fashion', function () {
    return view('user.fashion');
});
Route::get('/homePage', function () {
    return view('user.homePage');
});
Route::get('/profile', function () {
    return view('user.profile');
});
/*         USER       */





/* AUTH */
Route::get('/login', function () {
    return view('user.auth.login');
});
Route::get('/register', function () {
    return view('user.auth.register');
});
Route::get('/forgot', function () {
    return view('user.auth.forgot');
});
Route::get('/otp', function () {
    return view('user.auth.otp');
});
Route::get('/logout', function () {
    return view('user.auth.login');
});
/* AUTH */





/* PRODUCT */
Route::get('/4,240', function () {
    return view('product.pria jordan.4,240');
});
Route::get('/1,540', function () {
    return view('product.wanita jordan.1,540');
});
Route::get('/7,950', function () {
    return view('product.pria jordan.7,950');
});
Route::get('/15,700', function () {
    return view('product.pria jordan.15,700');
});
Route::get('/5,790', function () {
    return view('product.pria jordan.5,790');
});

Route::get('/viewmore', function () {
    return view('product.viewmore');
});
/* PRODUCT */






/* TEST */
Route::get('/test', function () {
    return view('test.test');
});
/* TEST */





/*   LINCENSE   */
Route::get('/license', function () {
    return view('license.license');
});
/*   LINCENSE   */






/*--------------*/
Route::get('/payment', function () {
    return view('layout.payment');
});
/*--------------*/




