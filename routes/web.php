<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DeliverymanController;
use App\Http\Controllers\Admin\GoogleMapController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductIntoShopController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ShopCategoryController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Delivery\DeliverChatController;
use App\Http\Controllers\Delivery\DeliveryboyController;
use App\Http\Controllers\Delivery\OrderdeliveryController;
use App\Http\Controllers\Pages\CartController;
use App\Http\Controllers\Pages\ContactUsController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Pages\ProductOrderController;
use App\Http\Controllers\Pages\RatingController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\OrderlistController;
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
    Route::resource('orders',OrderController::class);
    Route::get('reports', [ReportController::class, 'index'])->name('report.index');
    Route::get('reports/search', [ReportController::class, 'search'])->name('reports.search');
    Route::resource('contact', ContactController::class);
    Route::get('all-customers', [AdminController::class, 'customer'])->name('customer.list');
});

Route::group(['prefix' => 'user','middleware' => ['user', 'auth']], function (){
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::get('profile-update', [UserController::class, 'edit'])->name('user.profile-update');
    Route::PUT('update',[UserController::class,'update'])->name('user.profile.update');
    Route::get('change-password', [UserController::class, 'changePass'])->name('user.changepass');
    Route::post('change-password', [UserController::class, 'store'])->name('user.password.store');

    Route::resource('order-lists',OrderlistController::class);
    Route::resource('chats', ChatController::class);

});

Route::group(['prefix' => 'deliveryboy','middleware' => ['deliveryboy', 'auth']], function (){
    Route::get('index', [DeliveryboyController::class, 'index'])->name('delivery.index');
    Route::get('profile-update', [DeliveryboyController::class, 'edit'])->name('delivery.profile-update');
    Route::PUT('update',[DeliveryboyController::class,'update'])->name('delivery.profile.update');
    Route::get('change-password', [DeliveryboyController::class, 'changePass'])->name('delivery.changepass');
    Route::post('change-password', [DeliveryboyController::class, 'store'])->name('delivery.password.store');

    Route::resource('delivery-orders', OrderdeliveryController::class);
    Route::resource('deliver-chat', DeliverChatController::class);
});

//pages
Route::get('shops', [PageController::class, 'allShop'])->name('allshop.shop');
Route::get('shop/{name}', [PageController::class,'singleShop'])->name('single.shop');
Route::get('category/{id}', [PageController::class, 'prodcutCategory'])->name('category.shop.product');
Route::PUT('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('product.add.cart');
Route::get('cart',[CartController::class, 'index'])->name('cart.index');
Route::PUT('quantity-update/{id}', [CartController::class, 'quantityUpdate'])->name('qauntity.update');
Route::PUT('quantity-decrement/{id}', [CartController::class, 'quantityDecrement'])->name('qauntity.decrement');
Route::delete('remove-item/{id}', [CartController::class, 'removeItem'])->name('carts.destroy');
Route::post('order-product',[ProductOrderController::class, 'orderProduct'])->name('orderProduct');
Route::get('next-orders/{id}', [ProductOrderController::class, 'nextOrder'])->name('next.order.show');
Route::get('product-details/{id}', [PageController::class, 'product'])->name('product.details');
Route::resource('ratings', RatingController::class);
Route::resource('contact-us', ContactUsController::class);
Route::get('offer-products', [PageController::class, 'offerProduct'])->name('offer.product');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
