<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PanierController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Panier;

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
    Route::post('/password-update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    /*end  breeze route */
    
    Route::name("cart")->get('/cart',  [PanierController::class, 'displayPanier']);

    Route::name("cart.add")->put('/cart/add',  [PanierController::class, 'addArticle']);

    Route::name("cart.delete")->delete('/cart/remove',  [PanierController::class, 'removeArticle']);
    
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
    $articlesHeader=Article::all()->take(3);
    $articlesHeader2=Article::all()->take(2);
    $articles_by_categori=Article::all()->take(6);
    $art_cat_1=Article::find(2);
    $art_cat_2=Article::find(3);
    $art_cat_3=Article::find(4);
    $art_cat_4=Article::find(5);
    $art_cat_5=Article::find(6);
    $art_cat_6=Article::find(7);
    $articles_vedette=Article::all()->take(8);
    $new_articles=Article::all()->take(8);
    $paniers=Panier::all();
    return view('pages/home',compact('articlesHeader','articlesHeader2',
    'art_cat_1','art_cat_2','art_cat_3','art_cat_4','art_cat_5','art_cat_6',
    'articles_vedette','new_articles','paniers'));
});

Route::name("product-list")->get('/product-list', [ArticleController::class, 'listArticles']);

Route::name("product-detail")->get('/product-detail/{id?}',[ArticleController::class, 'displayArticle'])
->whereNumber('id');

Route::name("login")->get('/login', function () {
    return view('pages/login');
});

Route::name("contact")->get('/contact', function () {
    return view('pages/contact');
});

require __DIR__.'/auth.php';
