<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Restaurant;
use App\Models\Cart;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');
        $role = $request->role;

        if ($role === 'customer' && Auth::guard($role)->attempt($credentials)) {
            $user_id = Customer::where('email', $credentials['email'])->first()->id;
            $cart_counts = Cart::where('customer_id', $user_id)->count() ? Cart::where('customer_id', $user_id)->count() : 0;
            session(['cart_counts' => $cart_counts]);
            $notifications = Notification::with('transaction.customer', 'transaction.details.product.restaurant')
                ->orderBy('created_at', 'desc')
                ->get()
                ->filter(function ($notification) use ($user_id) {
                    return $notification->transaction->customer_id === $user_id;
                })
                ->map(function ($notification) {
                    return [
                        'transaction_id' => $notification->transaction->id,
                        'restaurant_name' => $notification->transaction->details->first()->product->restaurant->name,
                        'created_at' => $notification->created_at,
                        'status' => $notification->status
                    ];
                });

            session(['notifications' => $notifications]);
        }
        else if($role === 'restaurant' && Auth::guard($role)->attempt($credentials)){
            $restaurant_id = Restaurant::where('email', $credentials['email'])->first()->id;
            $notifications = Notification::with('transaction.customer', 'transaction.details.product.restaurant')
                ->orderBy('created_at', 'desc')
                ->get()
                ->filter(function ($notification) use ($restaurant_id) {
                    return $notification->transaction->details->first()->product->restaurant->id === $restaurant_id;
                })
                ->map(function ($notification) {
                    return [
                        'transaction_id' => $notification->transaction->id,
                        'customer_name' => $notification->transaction->customer->name,
                        'created_at' => $notification->created_at,
                        'status' => $notification->status
                    ];
                });
            session(['notifications' => $notifications]);
        }

        return Auth::guard($role)->attempt($credentials) ? redirect(route('indexPage')) : back()->with('error', (session()->get('locale') === 'en') ? 'Authentication Failed' : 'Autentikasi Gagal');
    }

    public static function register()
    {
        $customerData = session('customerData');
        $restaurantData = session('restaurantData');

        if (session('userType') === 'customer') {
            Customer::create([
                'name' => $customerData['customer_name'],
                'email' => $customerData['customer_email'],
                'password' => $customerData['customer_password'],
                'phone' => $customerData['customer_phone']
            ]);
        } else {
            $categoryId = Category::where('id', $restaurantData['restaurant_category'])->pluck('id')->first();

            Restaurant::create([
                'category_id' => $categoryId,
                'name' => $restaurantData['restaurant_name'],
                'email' => $restaurantData['restaurant_email'],
                'password' => $restaurantData['restaurant_password'],
                'phone' => $restaurantData['restaurant_phone'],
                'street' => $restaurantData['restaurant_street'],
                'province' =>  $restaurantData['restaurant_province'],
                'city' => $restaurantData['restaurant_city'],
                'subdistrict' => $restaurantData['restaurant_subdistrict'],
                'postal_code' => $restaurantData['restaurant_postal_code']
            ]);
        }

        $dataType = session('userType').'Data';
        $credentials = [
            'email' => $$dataType[session('userType') . '_email'],
            'password' => $$dataType[session('userType') . '_password']
        ];

        $userType = session('userType');
        session()->flush();
        if (Auth::guard($userType)->attempt($credentials))
        {
            return back();
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        Auth::guard('restaurant')->logout();

        return redirect()->route('loginPage');
    }
}
