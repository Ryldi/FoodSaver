<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('restaurant')->attempt($credentials))
        {
            return redirect(route('indexPage'));
        }
    }

    public function register(Request $request)
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
}
