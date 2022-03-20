<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GoogleMapController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductIntoShopController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Delivery\DeliveryboyController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileUpload;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin','middleware' => ['admin', 'auth']], function (){
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('category', CategoryController::class);
    Route::resource('shop', ShopController::class);
    Route::resource('google-map', GoogleMapController::class);
    Route::resource('product', ProductController::class);
    Route::get('all-product', [ProductIntoShopController::class, 'index'])->name('shop.product.index');
    Route::get('product-into-shop', [ProductIntoShopController::class, 'create'])->name('shop.product.create');
    Route::get('getProduct',[ProductIntoShopController::class, 'getProduct'])->name('getProduct');

});

Route::group(['prefix' => 'user','middleware' => ['user', 'auth']], function (){
    Route::get('index', [UserController::class, 'index'])->name('user.index');
});

Route::group(['prefix' => 'deliveryboy','middleware' => ['deliveryboy', 'auth']], function (){
    Route::get('index', [DeliveryboyController::class, 'index'])->name('delivery.index');
});
