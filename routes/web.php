<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Removal;
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
    Route::get('/categories/list', [CategoryController::class, 'fetchCategories'])->name('category.fetchCategories');

    Route::resource('brand', BrandController::class);
    Route::get('/brands', [BrandController::class, 'fetchBrands'])->name('brand.fetfetchs');

    //product routes
    Route::resource('product', ProductController::class);
    Route::get('/products/list', [ProductController::class, 'fetchProducts'])->name('product.fetchProduct');
    Route::post('/import/products', [ProductController::class, 'import'])->name('product.import');
    Route::get('download-example-csv', [ProductController::class, 'download'])->name('product.download');
    Route::get('product/{id}/list-items', [ProductController::class, 'listitems'])->name('product.listitems');
    Route::get('get-product-category/{id}', [ProductController::class, 'getProducts'])->name('product.getProducts');

    //Product Item routes
    Route::resource('productItem', ProductItemController::class);
    Route::get('productItem/product/{id}', [ProductItemController::class, 'index'])->name('productItem.index');
    Route::post('/import/product-items', [ProductItemController::class, 'import'])->name('productItem.import');

    //Branch Routes
    Route::resource('branch', BranchController::class);
    Route::get('/branches/list', [BranchController::class, 'fetchbranches'])->name('branch.fetchbranch');

    //Sender Receiver Routes
    Route::resource('sedrec', SedRecController::class);
    Route::get('/seder/receiver/list', [SedRecController::class, 'fetchSendRec'])->name('sedrec.fetchSendRec');

    //stock issue routes
    Route::resource('stock', StockController::class);
    Route::get('/stock-issue/branch/list', [StockController::class, 'fetchStock'])->name('stock.fetchStock');
    Route::get('search/products', [StockController::class, 'searchProduct'])->name('search.product');
    Route::get('products/items/list', [StockController::class, 'getProductItems'])->name('product.items');
    Route::get('/stock-issue/employee/list', [StockController::class, 'fetchStockEmp'])->name('stock.fetchStockEmp');
    Route::get('/stock-issue/employee/fetch', [StockController::class, 'employeeIsssue'])->name('stock.employeeIsssue');


    //Service Routes
    Route::resource('service', ServiceController::class);
    Route::get('/services/list', [ServiceController::class, 'fetchService'])->name('service.fetchService');

    //Company Routes
    Route::resource('company', CompanyController::class);
    Route::get('/companies/list', [CompanyController::class, 'fetchCompany'])->name('service.fetchCompany');

    //Role routes
    Route::resource('role', RoleController::class);
    Route::get('/roles/list', [RoleController::class, 'fetchRole'])->name('role.fetchRole');

    //User Routes
    Route::resource('user', UserController::class);
    Route::get('/users/list', [UserController::class, 'fetchUser'])->name('user.fetchUser');
    Route::get('/customers/list', [CustomerController::class, 'fetchCustomer'])->name('user.fetchCustomer');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('/customer/post', [CustomerController::class, 'store'])->name('customer.store');

    //Removal Routes
    Route::resource('removal', RemovalController::class);
    Route::get('/removals/list', [RemovalController::class, 'fetchRemoval'])->name('removal.fetchRemoval');

    //Removal Routes
    Route::resource('orderList', OrderController::class);
    Route::get('/orders/list', [OrderController::class, 'fetchOrder'])->name('order.fetchOrder');
    Route::post('orders/assign', [OrderController::class, 'assign_order'])->name('order.assign');
    Route::post('orders/change/status', [OrderController::class, 'change_status'])->name('order.status.change');
    Route::post('orders/change/tech_status', [OrderController::class, 'tech_change_status'])->name('order.tech_change_status');
    Route::post('orders/upload/deliveryimages', [OrderController::class, 'deliveryImg'])->name('order.deliveryImg');
});
