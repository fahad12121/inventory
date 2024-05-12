<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    $response = '';
    $response .= 'APP_ENV = ' . getenv('APP_ENV') . '<br/>';
    Artisan::call('config:clear');
    $response .= 'config cleared !<br/>';
    Artisan::call('cache:clear');
    $response .= 'cache cleared !<br/>';
    Artisan::call('view:clear');
    $response .= 'view cleared !<br/>';
    Artisan::call('route:clear');
    $response .= 'route cleared !<br/>';
    return $response;
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth.admin'])->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('parentcategory', ParentCategoryController::class);
    Route::resource('category', CategoryController::class);

    Route::resource('brand', BrandController::class);
    Route::get('/brands', [BrandController::class, 'fetchBrands'])->name('brand.fetfetchs');

    //product routes
    Route::resource('product', ProductController::class);
    Route::get('/products/list', [ProductController::class, 'fetchProducts'])->name('product.fetchProduct');
    Route::post('/import/products', [ProductController::class, 'import'])->name('product.import');
    Route::get('download-example-csv', [ProductController::class, 'download'])->name('product.download');

    //Branch Routes
    Route::resource('branch', BranchController::class);
    Route::get('/branches/list', [BranchController::class, 'fetchbranches'])->name('branch.fetchbranch');

    //Sender Receiver Routes
    Route::resource('sedrec', SedRecController::class);
    Route::get('/seder/receiver/list', [SedRecController::class, 'fetchSendRec'])->name('sedrec.fetchSendRec');

    //stock issue routes
    Route::resource('stock', StockController::class);
    Route::get('/stock-issue/branch/list', [StockController::class, 'fetchStock'])->name('stock.fetchStock');

    //Service Routes
    Route::resource('service', ServiceController::class);
    Route::get('/services/list', [ServiceController::class, 'fetchService'])->name('service.fetchService');
});
