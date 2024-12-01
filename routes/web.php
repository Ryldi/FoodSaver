<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('indexPage');

Route::get('/login', function(){
    return view('auth.login');
})->name('loginPage');

Route::get('/register', function(){
    return view('auth.register');
})->name('registerPage');

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

Route::post('/send-otp', [OTPController::class, 'sendOtp'])->name('sendOtp');
