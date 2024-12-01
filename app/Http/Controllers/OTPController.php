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
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required'
        ]);

        $selectedOtp = OTP::where('email', $request->email)->first();

        if (!$selectedOtp || $selectedOtp->updated_at->addMinutes(1)->isPast()) {
            $otp = rand(100000, 999999);

            $selectedOtp->update([
                'otp' => $otp,
                'updated_at' => now()
            ]);
        
            try {
                Mail::to($request->email)->send(new OTPMail($otp));
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to send OTP email.'], 500);
            }
        }

        return back()->with('user', $user);
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
