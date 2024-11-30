<?php

namespace App\Http\Controllers;

use App\Models\OTP;
use Illuminate\Http\Request;

class OTPController extends Controller
{
    public function sendOtp(Request $request)
    {
        $otp = rand(100000, 999999);

        OTP::updateOrCreate([
            'email' => $request->email,
            'otp' => $otp
        ]);

        return back();
    }

    public function verifyOtp()
    {

    }
}
