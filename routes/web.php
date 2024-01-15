<?php

use App\Http\Controllers\ProfileController;
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

/*start  breeze route */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
/*end  breeze route */

Route::middleware('auth')->group(function () {
    /*start  breeze route */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /*end  breeze route */
    
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
});

Route::name("home")->get('/', function () {
    return view('pages/home');
});

Route::name("product-list")->get('/product-list', function () {
    return view('pages/product-list');
});

Route::name("product-detail")->get('/product-detail', function () {
    return view('pages/product-detail');
});

Route::name("login")->get('/login', function () {
    return view('pages/login');
});

Route::name("contact")->get('/contact', function () {
    return view('pages/contact');
});

require __DIR__.'/auth.php';
