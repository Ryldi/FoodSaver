<?php

namespace App\Http\Controllers;

use App\Models\OTP;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($request->role === 'restaurant' && Auth::guard('restaurant')->attempt($credentials)) {
            
        } else if ($request->role === 'customer' && Auth::guard('customer')->attempt($credentials)) {
            
        }
        return redirect(route('indexPage'));
    }

    public static function register(Request $request)
    {
        dd($request);

        Restaurant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('restaurant')->attempt($credentials))
        {
            return redirect(route('indexPage'));
        }
        
        return back();
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        Auth::guard('restaurant')->logout();

        return redirect()->route('loginPage');
    }
}
