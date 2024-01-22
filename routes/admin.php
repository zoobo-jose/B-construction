<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCategoriController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPanierController;
use App\Http\Controllers\AdminArticleController;

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin',[AdminController::class, 'profil'])->name('admin');

    /* start categori route*/
    Route::get('/admin/categoris',[AdminCategoriController::class, 'list'])->name('admin.categoris');
    
    Route::get('/admin/categori/add', function () {
        return view('admin.categori.add');
    })->name('admin.categori.add.form');

    Route::post('/admin/categori/add',[AdminCategoriController::class, 'add'])
    ->name('admin.categori.add');

    Route::get('/admin/categori/update/{id}', [AdminCategoriController::class, 'updateForm'])
    ->name('admin.categori.update.form')->whereNumber('id');

    Route::post('/admin/categori/update',[AdminCategoriController::class, 'update'])
    ->name('admin.categori.update');

    Route::delete('/admin/categori/{id}',[AdminCategoriController::class, 'remove'])
    ->name('admin.categori.remove');

    /* end categori route*/

     /* start users route*/
    Route::get('/admin/users',[AdminUserController::class, 'list'])->name('admin.users');
    /* end users route*/

     /* start panier route*/
     Route::get('/admin/paniers',[AdminPanierController::class, 'list'])->name('admin.paniers');
     /* end paniers route*/

     /* start article route*/
     Route::get('/admin/article/add',[AdminArticleController::class, 'addForm'])->name('admin.article.add.form');
     Route::post('/admin/article/add',[AdminArticleController::class, 'add'])->name('admin.article.add');
     Route::get('/admin/articles',[AdminArticleController::class, 'list'])->name('admin.articles');
     Route::get('/admin/article/{id}',[AdminArticleController::class, 'one'])->name('admin.article');
     Route::delete('/admin/article',[AdminArticleController::class, 'delete'])->name('admin.article.delete');
     Route::put('/admin/article',[AdminArticleController::class, 'update'])->name('admin.article.update');
     Route::post('/admin/article/image',[AdminArticleController::class, 'addImage'])->name('admin.article.add.image');
     Route::put('/admin/article/image',[AdminArticleController::class, 'updateImage'])->name('admin.article.update.image');
     Route::delete('/admin/article/image',[AdminArticleController::class, 'deleteImage'])->name('admin.article.delete.image');
     Route::post('/admin/article/pdf',[AdminArticleController::class, 'addPdf'])->name('admin.article.add.pdf');
     Route::put('/admin/article/pdf',[AdminArticleController::class, 'updatePdf'])->name('admin.article.update.pdf');
     Route::delete('/admin/article/pdf',[AdminArticleController::class, 'deletePdf'])->name('admin.article.delete.pdf');
     /* end article route*/
});
