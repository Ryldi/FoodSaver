<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CustomerCoupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        if(Auth::guard('customer')->check()){
            $coupons = Coupon::with('restaurant')->whereDoesntHave('customer_coupon', function ($query) {
                $query->where('customer_id', Auth::guard('customer')->user()->id);
            })->where('status', 'active')->get();            
        }
        else if(Auth::guard('restaurant')->check()){
            $coupons = Coupon::where('restaurant_id', Auth::guard('restaurant')->user()->id)->get();
        }

        // dd($coupons);
        return view('pages.promo', compact('coupons'));
    }

    public function myPromo()
    {
        $coupons = Coupon::with('restaurant')->whereHas('customer_coupon', function ($query) {
            $query->where('customer_id', Auth::guard('customer')->user()->id)->where('is_used', 0);
        })->where('status', 'active')->get();

        return view('pages.myPromo', compact('coupons'));
    }
    public function add(Request $request)
    {
        // dd($request);
        $request->validate([
            'disc_percentage' => 'required',
            'date' => 'required',
            'max_disc' => 'required',
            'min_spend' => 'required',
            'description' => 'required'
        ]);

        $endDateTime = $request->date . ' 23:59:59';

        Coupon::create([
            'end' => $endDateTime,
            'status' => 'active',
            'desc' => $request->description,
            'percent' => $request->disc_percentage,
            'max_disc' => $request->max_disc,
            'min_spend' => $request->min_spend,
            'restaurant_id' => Auth::guard('restaurant')->user()->id
        ]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Coupon successfully added' : 'Kupon berhasil ditambahkan');
    }

    public function delete(Request $request)
    {
        // dd($request);
        $coupon = Coupon::find($request->id);
        $coupon->delete();

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Coupon successfully deleted' : 'Kupon berhasil dihapus');
    }

    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'disc_percentage' => 'required',
            'date' => 'required',
            'max_disc' => 'required',
            'min_spend' => 'required',
            'description' => 'required'
        ]);

        $endDateTime = $request->date . ' 23:59:59';

        $coupon = Coupon::find($request->id)->update([
            'end' => $endDateTime,
            'desc' => $request->description,
            'percent' => $request->disc_percentage,
            'max_disc' => $request->max_disc,
            'min_spend' => $request->min_spend
        ]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Coupon successfully updated' : 'Kupon berhasil diperbarui');
    }

    public function claim($id)
    {
        CustomerCoupon::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'coupon_id' => $id
        ]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Coupon successfully claimed' : 'Kupon berhasil diklaim');
    }
}
