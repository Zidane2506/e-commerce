<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\ProductGalleryController;

Route::get('/', [FrontEndController::class, 'index']);
Route::get('/detailProduct/{slug}', [FrontEndController::class, 'detailProduct'])->name('detail.product');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    Route::resource('/category',CategoryController::class)->except(['create','show', 'edit']);
    //Route::put('/resetPassword',DashboardController::class, 'resetPassword')->name('resetPassword');
    Route::resource('/product',ProductController::class)->except(['create','show', 'edit']);
    Route::resource('/product.gallery', ProductGalleryController::class)->except(['create', 'show', 'edit', 'update']);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/myTransaction', MyTransactionController::class)->only('index', 'show');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class,'index'])->name('dashboard');
    Route::resource('/myTransaction', MyTransactionController::class)->only('show', 'index');
    // Route::put('/changePassword', [\App\Http\Controllers\User\DashboardController::class,'changePassword']);
});
