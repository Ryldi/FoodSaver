<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRegisterRequest;
use App\Http\Requests\RestaurantRegisterRequest;
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
        session(['userType' => $request->userType]);

        if (session('userType') === 'customer') {
            $validated = app(CustomerRegisterRequest::class)->validated();
            session(['customerData' => $validated]);
            // session(['customerData' => $request->only(['customer_name', 'customer_email', 'customer_password', 'customer_phone'])]);
        } else if (session('userType') === 'restaurant') {
            $validated = app(RestaurantRegisterRequest::class)->validated();
            session(['restaurantData' => $validated]);
            // session(['restaurantData' => $request->only(['restaurant_name', 'restaurant_email', 'restaurant_password', 'restaurant_phone', 'restaurant_category', 'restaurant_street', 'restaurant_province', 'restaurant_city', 'restaurant_subdistrict', 'restaurant_postal_code'])]);
        }

        $email = $request->userType.'_email';
        $selectedOtp = OTP::where('email', $request->{$email})->first();
        $otp = rand(100000, 999999);
        
        if (!$selectedOtp) {
            OTP::create([
                'email' => $request->{$email},
                'otp' => $otp
            ]);
        } else{
            $selectedOtp->update([
                'otp' => $otp,
                'updated_at' => now()
            ]);
        }
        
        try {
            Mail::to($request->{$email})->send(new OTPMail($otp));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send OTP email.'], 500);
        }

        session(['otp' => true]);
        session(['otp_expiry' => now()->addMinute()]);
        
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
        return back()->withErrors(['otpFailed' => (session()->get('locale') === 'en') ? 'OTP code is incorrect' : 'Kode OTP salah']);
    }
}
