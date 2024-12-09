<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('pages.index');
})->name('indexPage');

Route::get('/login', function(){
    return view('auth.login');
})->name('loginPage');

Route::get('/register', [OTPController::class, 'registerPage'])->name('registerPage');

Route::get('/about', function(){
    return view('pages.about');
})->name('about-us');

Route::get('/policy', function(){
    return view('pages.policy');
})->name('policy');

Route::get('/categoryDetail/{id}', [CategoryController::class, 'index'])->name('categoryPage');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/send-otp', [OTPController::class, 'sendOtp'])->name('sendOtp');
Route::post('/verify-otp', [OTPController::class, 'verifyOtp'])->name('verifyOtp');

Route::put('/updateAddress', [RestaurantController::class, 'updateAddress'])->name('updateAddress');
Route::put('/updateProfileImageRestaurant', [RestaurantController::class, 'updateProfileImage'])->name('updateProfileImageRestaurant');
Route::put('/updateProfileImageCustomer', [CustomerController::class, 'updateProfileImage'])->name('updateProfileImageCustomer');
Route::put('/updatePasswordRestaurant', [RestaurantController::class, 'updatePassword'])->name('updatePasswordRestaurant');
Route::put('/updatePasswordCustomer', [CustomerController::class, 'updatePassword'])->name('updatePasswordCustomer');

Route::get('/myProfile', function(){
    return view('pages.profile');
})->name('profilePage');

Route::get('/manageProduct', [ProductController::class, 'index'])->name('manageProductPage');
Route::get('manageProduct1', function(){
    return view('pages.manageProduct1');
})->name('manageProduct1');

Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
Route::put('/changeProductStatus/{id}', [ProductController::class, 'changeProductStatus'])->name('changeProductStatus');
Route::put('/editProduct', [ProductController::class, 'editProduct'])->name('editProduct');

Route::get('/restaurant/{id}', [RestaurantController::class, 'index'])->name('restaurantDetailPage');

Route::get('promo', function(){
    return view('pages.promo');
})->name('promoPage');

Route::get('myPromo', function(){
    return view('pages.myPromo');
})->name('myPromoPage');

Route::get('orderList', function(){
    return view('pages.orderList');
})->name('orderListPage');

Route::get('cart', [CartController::class, 'index'])->name('cartPage');
Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
Route::put('/updateCart', [CartController::class, 'updateCart'])->name('updateCart');
Route::delete('/deleteCart/{id}', [CartController::class, 'deleteCart'])->name('deleteFromCart');

Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');