<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



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
    
    Route::name("wishlist")->get('/wishlist', [WishController::class, 'displayWish']);
    
    Route::name("wishlist.add")->put('/wishlist/add',  [WishController::class, 'addArticle']);

    Route::name("wishlist.delete")->delete('/wishlist/remove',  [WishController::class, 'removeArticle']);

    Route::name("checkout")->get('/checkout', function () {
        return view('pages/checkout');
    });
    
    Route::name("my-account")->get('/my-account', function () {
        return view('pages/my-account');
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
    $comments=Comment::all();
    return view('pages/home',compact('articlesHeader','articlesHeader2',
    'art_cat_1','art_cat_2','art_cat_3','art_cat_4','art_cat_5','art_cat_6',
    'articles_vedette','new_articles','comments'));
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

Route::name("newsletter")->post('/newsletter', [NewsletterController::class, 'store']);

Route::name("comment.add")->any('/comment/add',  [CommentController::class, 'addComment']);

Route::name("test")->get('/test', function(Request $request){
    return view('test');
});
Route::name("test.post")->post('/test', function(Request $request){
    $file = $request->file('file');
    if($file){
        $name = $file->getClientOriginalName();
        dd(Storage::disk('local')->put('files/img', $file));
    }
    $url_file=Storage::download('test.webp');
    return view('test',compact('url_file'));
});




require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
