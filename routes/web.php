<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name("home")->get('/', function () {
    return view('pages/home');
});

Route::name("product-list")->get('/product-list', function () {
    return view('pages/product-list');
});

Route::name("product-detail")->get('/product-detail', function () {
    return view('pages/product-detail');
});

Route::name("cart")->get('/cart', function () {
    return view('pages/cart');
});

Route::name("checkout")->get('/checkout', function () {
    return view('pages/checkout');
});

Route::name("my-account")->get('/my-account', function () {
    return view('pages/my-account');
});

Route::name("wishlist")->get('/wishlist', function () {
    return view('pages/wishlist');
});

Route::name("login")->get('/login', function () {
    return view('pages/login');
});

Route::name("contact")->get('/contact', function () {
    return view('pages/contact');
});