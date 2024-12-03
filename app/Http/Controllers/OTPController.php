<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\OTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OTPController extends Controller
{
    public function registerPage()
    {
        $currentData = session('currentData');
        session()->forget('currentData');

        return view('auth.register', compact('currentData'));
    }

    public function sendOtp(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required'
        ]);

        // || $selectedOtp->updated_at->addMinutes(1)->isPast()
        $selectedOtp = OTP::where('email', $request->email)->first();
        $otp = rand(100000, 999999);
        
        if (!$selectedOtp) {
            
            OTP::create([
                'email' => $request->email,
                'otp' => $otp
            ]);
            
            try {
                Mail::to($request->email)->send(new OTPMail($otp));
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to send OTP email.'], 500);
            }
            
            session(['otp' => true]);
        } else{
            $selectedOtp->update([
                'otp' => $otp,
                'updated_at' => now()
            ]);
        }

        session(['currentData' => $request->only(['name', 'email', 'password', 'phone'])]);
        
        return redirect()->route('registerPage');
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
