<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/register', function(){
<<<<<<< Updated upstream
    return view('register');
})->name('register');
=======
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
>>>>>>> Stashed changes
