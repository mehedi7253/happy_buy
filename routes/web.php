<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeliverymanController;
use App\Http\Controllers\Admin\GoogleMapController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductIntoShopController;
use App\Http\Controllers\Admin\ShopCategoryController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Delivery\DeliveryboyController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

use App\Models\shop;

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
    $shop = shop::limit(5)->get();
    return view('welcome', compact('shop'));
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin','middleware' => ['admin', 'auth']], function (){
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('category', CategoryController::class);
    Route::resource('shop', ShopController::class);
    Route::resource('google-map', GoogleMapController::class);
    Route::resource('product', ProductController::class);
    // Route::get('all-product', [ProductIntoShopController::class, 'index'])->name('shop.product.index');
    // Route::get('product-into-shop', [ProductIntoShopController::class, 'create'])->name('shop.product.create');
    // Route::post('get-product', [ProductIntoShopController::class, 'searchProduct'])->name('search.product');
    // Route::post('store-product', [ProductIntoShopController::class, 'store'])->name('store.product.shop');
    // Route::get('shop-products/{id}', [ProductIntoShopController::class, 'show'])->name('product.shop.show');
    // Route::delete('shpop-prodcut-delete/{id}', [ProductIntoShopController::class, 'delete'])->name('product.shop.delete');

    Route::resource('shop-category', ShopCategoryController::class);
    Route::resource('delivery-man', DeliverymanController::class);

});

Route::group(['prefix' => 'user','middleware' => ['user', 'auth']], function (){
    Route::get('index', [UserController::class, 'index'])->name('user.index');
});

Route::group(['prefix' => 'deliveryboy','middleware' => ['deliveryboy', 'auth']], function (){
    Route::get('index', [DeliveryboyController::class, 'index'])->name('delivery.index');
});

//pages
Route::get('{name}', [PageController::class,'singleShop'])->name('single.shop');
Route::get('category/{id}', [PageController::class, 'prodcutCategory'])->name('category.shop.product');
