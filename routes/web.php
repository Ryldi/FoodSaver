<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\NotificationController;

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

Route::get('/setLang/{locale}', function($locale){
    if(in_array($locale, ['en', 'id'])){
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('setLanguage');

Route::get('/restaurant', [RestaurantController::class, 'getAllRestaurant'])->name('restaurantPage');
Route::get('/category/{id}', [RestaurantController::class, 'getByCategory'])->name('restaurantFilter');
Route::get('/restaurant/{id}', [RestaurantController::class, 'index'])->name('restaurantDetailPage');
Route::get('/restaurantSort', [RestaurantController::class, 'sortRestaurant'])->name('restaurantSort');
Route::get('/restaurantSearch', [RestaurantController::class, 'searchRestaurant'])->name('searchRestaurant');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/send-otp', [OTPController::class, 'sendOtp'])->name('sendOtp');
Route::post('/verify-otp', [OTPController::class, 'verifyOtp'])->name('verifyOtp');

Route::get('/forbidden', function(){
    return view('auth.403');
})->name('forbidden');

Route::middleware(['RestaurantMiddleware'])->group(function () {
    //restaurant
    Route::put('/updateAddress', [RestaurantController::class, 'updateAddress'])->name('updateAddress');
    Route::put('/updateProfileImageRestaurant', [RestaurantController::class, 'updateProfileImage'])->name('updateProfileImageRestaurant');
    Route::put('/updatePasswordRestaurant', [RestaurantController::class, 'updatePassword'])->name('updatePasswordRestaurant');
    Route::put('/updateDescription', [RestaurantController::class, 'updateDescription'])->name('updateDescription');

    Route::get('/manageProduct', [ProductController::class, 'index'])->name('manageProductPage');
    Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::put('/changeProductStatus/{id}', [ProductController::class, 'changeProductStatus'])->name('changeProductStatus');
    Route::put('/editProduct', [ProductController::class, 'editProduct'])->name('editProduct');

    Route::get('orderList', [TransactionController::class, 'orderList'])->name('orderListPage');

    Route::put('/prepareOrder/{id}', [TransactionController::class, 'prepareOrder'])->name('prepareOrder');
    Route::put('/completeOrder/{id}', [TransactionController::class, 'completeOrder'])->name('completeOrder');

    Route::post('/addPromo', [CouponController::class, 'add'])->name('addPromo');
    Route::delete('/deletePromo', [CouponController::class, 'delete'])->name('deletePromo');
    Route::put('/updatePromo', [CouponController::class, 'update'])->name('updatePromo');
});

Route::middleware(['CustomerMiddleware'])->group(function () {
    //customer
    Route::put('/updateProfileImageCustomer', [CustomerController::class, 'updateProfileImage'])->name('updateProfileImageCustomer');
    Route::put('/updatePasswordCustomer', [CustomerController::class, 'updatePassword'])->name('updatePasswordCustomer');

    Route::get('cart', [CartController::class, 'index'])->name('cartPage');
    Route::post('cart', [CartController::class, 'loadCoupon'])->name('selectCoupon');
    Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::put('/updateCart', [CartController::class, 'updateCart'])->name('updateCart');
    Route::delete('/deleteCart/{id}', [CartController::class, 'deleteCart'])->name('deleteFromCart');

    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');

    Route::get('/transactionList', [TransactionController::class, 'index'])->name('transactionListPage');

    Route::get('/success/{id}', [TransactionController::class, 'paymentSuccess'])->name('paymentSuccess');

    Route::put('/reviewOrder/{id}', [TransactionController::class, 'reviewOrder'])->name('reviewOrder');

    Route::get('/myPromo', [CouponController::class, 'myPromo'])->name('myPromoPage');

    Route::post('/claimCoupon/{id}', [CouponController::class, 'claim'])->name('claimCoupon');
    
});

Route::middleware(['AuthMiddleware'])->group(function () {
    //logged
    Route::get('/myProfile', function(){
        return view('pages.profile');
    })->name('profilePage');

    Route::get('/promo', [CouponController::class, 'index'])->name('promoPage');
    Route::get('/transaction/{id}', [TransactionController::class, 'getTransaction'])->name('transactionPage');
    Route::get('/api/notifications', [NotificationController::class, 'getNotifications'])->name('getNotifications');
});