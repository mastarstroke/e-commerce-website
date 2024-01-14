<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('shop', [HomeController::class, 'shopView'])->name('shop');
Route::get('my-orders', [HomeController::class, 'myOrders'])->name('my-orders');
Route::get('view-order/{id}', [HomeController::class, 'viewOrder'])->name('view-order');
Route::get('order-histories', [HomeController::class, 'orderHistories'])->name('order-histories');

Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::post('contacts-us', [HomeController::class, 'contactsUs'])->name('contacts-us');

Route::get('redirects', [HomeController::class, 'redirect']);

Route::post('addtocart/{id}', [CartController::class, 'addToCart'])->name('addtocart');
Route::get('cart-view', [CartController::class, 'cartView'])->name('cart-view');
Route::delete('cart/delete/{id}', [CartController::class, 'deleteCart'])->name('delete-cart');

Route::post('addtowishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('addtowishlist');
Route::get('wishlist-view', [WishlistController::class, 'wishlistView'])->name('wishlist-view');
Route::delete('wishlist/delete/{id}', [WishlistController::class, 'deleteWishlist'])->name('delete-wishlist');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('place-order', [CheckoutController::class, 'placeOrder'])->name('place-order');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('users', [HomeController::class, 'usersView'])->name('users');

    Route::get('category/add', [CategoryController::class, 'addCategory'])->name('add-category');
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::post('category/store', [CategoryController::class, 'storeCategory'])->name('store-category');
    
    Route::get('category/edit/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
    Route::post('category/update/{id}', [CategoryController::class, 'updateCategory'])->name('update-category');
    Route::delete('category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');


    Route::get('product/add', [ProductController::class, 'addProduct'])->name('add-product');
    Route::get('product', [ProductController::class, 'index'])->name('product');
    Route::post('product/store', [ProductController::class, 'storeProduct'])->name('store-product');

    Route::get('product/edit/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('product/update/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
    Route::delete('product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');

    Route::get('new-orders', [OrderController::class, 'newOrders'])->name('new-orders');
    Route::get('view-orders/{id}', [OrderController::class, 'viewOrders'])->name('view-orders');
    Route::post('update-orders/{id}', [OrderController::class, 'updateOrder'])->name('update-orders');
    Route::get('order-history', [OrderController::class, 'orderHistory'])->name('order-history');

    Route::get('messages', [HomeController::class, 'messageUs'])->name('message');
    Route::post('update-message/{id}', [HomeController::class, 'messageUpdate'])->name('update-message');

});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
