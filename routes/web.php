<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\InventoryController;

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
    return view('visitor.welcome');
});

Route::get('/shop', [ProductController::class, 'index']);
Route::get('/home', function () {
    return view('admin.admin');
});
Route::get('/list', [ProductController::class, 'index']);
Route::get('/list/{id}', [ProductController::class, 'loadProd']);
Route::post('/list/edit/{id}', [ProductController::class, 'editProd']);

Route::get('/create', [ProductController::class, 'loadCreate']);
Route::post('/create/add', [ProductController::class, 'add']);
Route::post('/delete', [ProductController::class, 'delete']);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/clear', [CartController::class, 'clear']);
Route::get('/cart/update/{id}&{qty}', [CartController::class, 'update']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
Route::post('/cart/store', [CartController::class, 'store']);

Route::get('/checkout', [CartController::class, 'checkout']);

Route::get('/orders', [CustomerController::class, 'index']);
Route::get('/orders/details/{code}&{name}&{address}&{status}', [OrderController::class, 'index']);
Route::get('/orders/details/process/{code}&{name}&{address}&{status}', [OrderController::class, 'process']);

Route::get('/track', function () {
    return view('visitor.orderTracker');
});
Route::get('/track/view', [TrackerController::class, 'loadTracker']);

Route::get('/inventory', [InventoryController::class, 'index']);
Route::post('/inventory/update/{id}', [InventoryController::class, 'update']);

Auth::routes();