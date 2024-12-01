<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\OTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OTPController extends Controller
{
    public function sendOtp(Request $request)
    {
        // Validate

        $otp = rand(100000, 999999);

        OTP::updateOrCreate([
            'email' => $request->email,
            'otp' => $otp
        ]);

        Mail::to("bernardbereness78@gmail.com")->send(new OTPMail($otp));

        return back();
    }

    public function verifyOtp(Request $request)
    {
        $selectedOtp = OTP::where('email', $request->email)->first();

        if ($selectedOtp->created_at->addMinutes(10)->lessThan(now()) && $selectedOtp->otp === $request->otp) {
            $selectedOtp->delete();
            AuthController::register($request);
        } else {
            
        }

    }
}
