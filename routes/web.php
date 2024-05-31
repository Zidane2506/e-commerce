<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\ProductGalleryController;

Route::get('/', [FrontEndController::class, 'index'])->name('index.front');
Route::get('/detailProduct/{slug}', [FrontEndController::class, 'detailProduct'])->name('detail.product');
Route::get('/detailCategory/{slug}', [FrontEndController::class, 'detailCategory'])->name('detail.category');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [FrontEndController::class, 'cart'])->name('cart');
    Route::post('/cart/{id}', [FrontEndController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/{id}', [FrontEndController::class, 'deleteCart'])->name('cart.delete');
    Route::post('/checkOut', [FrontEndController::class, 'checkout'])->name('checkOut');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/category', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::get('/list-user', [DashboardController::class, 'listUser'])->name('list-user');
    Route::resource('/product', ProductController::class)->except(['create', 'show', 'edit']);
    Route::resource('/product.gallery', ProductGalleryController::class)->except(['create', 'show', 'edit', 'update']);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/myTransaction', MyTransactionController::class)->only('index');
    Route::get('/myTransaction/{id}/{slug}', [MyTransactionController::class, 'showDataBySlugAndId'])->name('myTransaction.show');
    Route::get('/transaction/{id}/{slug}', [TransactionController::class, 'showTransactionUseAdminWithSlugAndId'])->name('showTransactionUseAdminWithSlugAndId');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/myTransaction', MyTransactionController::class)->only('index');
    Route::get('/change-password', [\App\Http\Controllers\User\DashboardController::class, 'changePassword'])->name('changePassword');
    Route::put('/update-password', [\App\Http\Controllers\User\DashboardController::class, 'updatePassword'])->name('update-password');
    Route::get('/myTransaction/{id}/{slug}', [MyTransactionController::class, 'showDataBySlugAndId'])->name('myTransaction.show');
    // Route::put('/changePassword', [\App\Http\Controllers\User\DashboardController::class,'changePassword']);
});

// Route::Artisan Call
Route::get('/artisan-call', function()
{
    Artisan::call('storage:link'); //Storage:Link
    Artisan::call('route:clear'); //Route:Clear
    Artisan::call('config:clear'); //Config:Clear
    return 'success';
});
