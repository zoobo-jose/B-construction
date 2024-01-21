<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminCategoriController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPanierController;

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.profile');
    })->name('admin');

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
});
