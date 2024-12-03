<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

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

Route::get('/categoryDetail', function(){
    return view('pages.categoryDetail');
})->name('categoryDetail');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/send-otp', [OTPController::class, 'sendOtp'])->name('sendOtp');
Route::post('/verify-otp', [OTPController::class, 'verifyOtp'])->name('verifyOtp');

Route::post('/updateAddress', [RestaurantController::class, 'updateAddress'])->name('updateAddress');
Route::post('/updateProfileImage', [RestaurantController::class, 'updateProfileImage'])->name('updateProfileImage');
Route::post('/updatePassword', [RestaurantController::class, 'updatePassword'])->name('updatePassword');
Route::get('/myProfile', function(){
    return view('pages.profile');
})->name('profilePage');

Route::get('/manageProduct', function () {
    return view('pages.manageProduct');
});

Route::get('restaurant', function(){
    return view('pages.restaurantDetail');
})->name('restaurantPage');
