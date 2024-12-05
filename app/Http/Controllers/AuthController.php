<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');
        $role = $request->role;

        return Auth::guard($role)->attempt($credentials) ? redirect(route('indexPage')) : back()->with('error', 'Autentikasi Gagal');
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
            $categoryId = Category::where('name', $restaurantData['restaurant_category'])->pluck('id')->first();

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
