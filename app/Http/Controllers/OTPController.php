<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\OTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OTPController extends Controller
{
    public function registerPage()
    {
        $userData = session('userData');

        return view('auth.register', compact('userData'));
    }

    public function sendOtp(Request $request)
    {
        $email = $request->userType.'_email';
        $selectedOtp = OTP::where('email', $request->{$email})->first();
        $otp = rand(100000, 999999);
        
        if (!$selectedOtp) {
            OTP::create([
                'email' => $request->{$email},
                'otp' => $otp
            ]);
            
            try {
                Mail::to($request->{$email})->send(new OTPMail($otp));
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to send OTP email.'], 500);
            }
        } else{
            $selectedOtp->update([
                'otp' => $otp,
                'updated_at' => now()
            ]);
        }
        
        session(['otp' => true]);
        session(['userType' => $request->userType]);
        session(['customerData' => $request->only(['customer_name', 'customer_email', 'customer_password', 'customer_phone'])]);
        session(['restaurantData' => $request->only(['restaurant_name', 'restaurant_email', 'restaurant_password', 'restaurant_phone', 'restaurant_category', 'restaurant_street', 'restaurant_province', 'restaurant_city', 'restaurant_subdistrict', 'restaurant_postal_code'])]);
        
        return redirect()->route('registerPage');
    }

    public function verifyOtp(Request $request)
    {
        $email = session(session('userType').'Data')[session('userType').'_email'];
        $otp = $request->otp_1.$request->otp_2.$request->otp_3.$request->otp_4.$request->otp_5.$request->otp_6;
        $selectedOtp = OTP::where('email', $email)->first();

        if ($selectedOtp->updated_at->addMinutes(1) > now() && $selectedOtp->otp === $otp) {
            $selectedOtp->delete();
            AuthController::register();
            return redirect(route('indexPage'));
        }
        return back()->withErrors(['otpFailed' => 'Kode OTP salah!!']);
    }
}
