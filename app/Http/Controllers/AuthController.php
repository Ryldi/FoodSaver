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
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $role = $request->role;

        return Auth::guard($role)->attempt($credentials) ? redirect(route('indexPage')) : back()->with('error', 'Autentikasi Gagal');
    }

    public static function register(Request $request)
    {
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
