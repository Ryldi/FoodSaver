<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home.view');

Route::get('/login', function(){
    return view('login');
})->name('auth.login');

Route::get('/register', function(){
    return view('register');
})->name('auth.register');

Route::get('/about', function(){
    return view('pages.about');
})->name('about-us');

