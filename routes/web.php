<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Delivery\DeliveryboyController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin','middleware' => ['admin', 'auth'], 'namespace'=>'admin'], function (){
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
});

Route::group(['prefix' => 'user','middleware' => ['user', 'auth'], 'namespace'=>'user'], function (){
    Route::get('index', [UserController::class, 'index'])->name('user.index');
});

Route::group(['prefix' => 'deliveryboy','middleware' => ['deliveryboy', 'auth'], 'namespace'=>'deliveryboy'], function (){
    Route::get('index', [DeliveryboyController::class, 'index'])->name('delivery.index');
});
