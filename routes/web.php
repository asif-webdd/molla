<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Cart;
use App\Http\Controllers\CartController;
use App\Http\Controllers\order\CustomersController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/********** Frontend **********/
Route::get('/', [SiteController::class, 'index'])->name('index');

/********** Cart **********/
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

/********** Single Product **********/
Route::get('/product/{slug}', [SiteController::class, 'product'])->name('product');

/********** Categories Wise Products **********/
Route::get('/category/{slug}/{slug2?}/{slug3?}', [SiteController::class, 'cat_products'])->name('cat.products');

/********** Dashboard **********/
Route::prefix('staff')->name('staff.')->middleware(['auth'])->group(function (){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::prefix('/users')->name('users.')->group(function (){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/create', [UserController::class, 'store'])->name('register');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update', [UserController::class, 'update'])->name('update');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::post('/change-status', [UserController::class, 'Status'])->name('Status');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');

        Route::post('/bulk-action', [UserController::class, 'bulk_action'])->name('bulkAction');
    });

    /********** Categories **********/
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);

    /********** Customers **********/
    Route::get('/customers', [CustomersController::class, 'get_customers'])->name('customers');
});


Route::prefix('customer')->name('customer.')->group(function (){
    Route::get('registration', [CustomersController::class, 'registration'])->name('registration');
    Route::post('registration', [CustomersController::class, 'registration']);

    Route::post('login', [CustomersController::class, 'login'])->name('login');
    Route::get('logout', [CustomersController::class, 'logout'])->name('logout');

    Route::get('verify/{token}', [CustomersController::class, 'verify'])->name('verify');

    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CartController::class, 'new_order']);
});

require __DIR__.'/auth.php';
