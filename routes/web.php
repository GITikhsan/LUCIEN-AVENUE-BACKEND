<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*         ADMIN       */
Route::get('/admin', function () {
    return view('admin.admin');
});
Route::get('/employeeLogin', function () {
    return view('admin.employeeLogin');
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
// use App\Livewire\Profile; 
// Route::get('/profile', Profile::class);
Route::get('/profile', function () {
    return view('user.profile');
});
Route::get('/settings', function () {
    return view('user.settings');
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
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


/* AUTH */





/* PRODUCT */
use App\Livewire\Product4240;

Route::get('/produk/4240', Product4240::class);

use App\Livewire\Viewmore;

Route::get('/viewmore', Viewmore::class);


Route::get('/1,540', function () {
    return view('product.wanita-jordan.1,540');
});
Route::get('/1,200', function () {
    return view('product.youth-adidas.1,200');
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

use App\Livewire\Counter; 
Route::get('/counter', Counter::class);

use App\Livewire\AboutUs; 
Route::get('/about-us', AboutUs::class);





