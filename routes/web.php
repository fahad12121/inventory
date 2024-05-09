<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ParentCategory;
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
    Route::resource('product', ProductController::class);
});
