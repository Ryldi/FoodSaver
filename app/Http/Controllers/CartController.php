<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::where('customer_id', Auth::guard('customer')->user()->id)->with('product.restaurant')->get();
        $total = $items->sum('product.price');
        $carts = $items->groupBy(function ($cart) {
            return $cart->product->restaurant->id;
        })->map(function ($group) {
            $total = 0;
            foreach ($group as $cart) {
                $total += $cart->product->price * $cart->quantity;
            }
            $customer = Customer::with('customer_coupon')->find(Auth::guard('customer')->user()->id);
            $customerCoupons = $customer->customer_coupon()->with('coupon.restaurant')->get();

            return [
                'restaurant' => $group->first()->product->restaurant,
                'carts' => $group,
                'total_price' => $total,
                'coupons' => $customerCoupons->where('coupon.restaurant.id', $group->first()->product->restaurant->id)
                                            ->where('coupon.status', 'active')
                                            ->where('is_used', 0)
                                                ->pluck('coupon'),
            ];
        });
        return view('pages.cart', compact('carts'));
    }

    public function loadCoupon(Request $request)
    {
        $request->validate([
            'coupon' => 'required'
        ]);

        

        $items = Cart::where('customer_id', Auth::guard('customer')->user()->id)->with('product.restaurant')->get();
        $total = $items->sum('product.price');
        $carts = $items->groupBy(function ($cart) {
            return $cart->product->restaurant->id;
        })->map(function ($group) use ($request) {
            $total = 0;
            foreach ($group as $cart) {
                $total += $cart->product->price * $cart->quantity;
            }

            $coupon = Coupon::with('restaurant')->find($request->coupon);
            if($coupon->restaurant->id != $group->first()->product->restaurant->id || $coupon->status != 'active' || $total < $coupon->min_spend) {
                $coupon = null;
            }

            $customer = Customer::with('customer_coupon')->find(Auth::guard('customer')->user()->id);
            $customerCoupons = $customer->customer_coupon()->with('coupon.restaurant')->get();

            return [
                'restaurant' => $group->first()->product->restaurant,
                'carts' => $group,
                'total_price' => $total,
                'coupons' => $customerCoupons->where('coupon.restaurant.id', $group->first()->product->restaurant->id)
                                            ->where('coupon.status', 'active')
                                            ->where('is_used', 0)
                                                ->pluck('coupon'), //ini masih ngambil coupon restaurant, bukan coupon customer
                'coupon' => $coupon
            ];
        });

        return view('pages.cart', compact('carts'));

    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1'
        ]);

        if(Cart::where('customer_id', Auth::guard('customer')->user()->id)->where('product_id', $request->product_id)->exists()) {
            Cart::where('customer_id', Auth::guard('customer')->user()->id)->where('product_id', $request->product_id)->update([
                'quantity' => Cart::where('customer_id', Auth::guard('customer')->user()->id)->where('product_id', $request->product_id)->first()->quantity + $request->quantity
            ]);

            return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Product successfully added to cart' : 'Produk berhasil ditambahkan ke keranjang');
        }

        Cart::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        $cart_counts = Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() ? Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() : 0;
        session(['cart_counts' => $cart_counts]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Product successfully added to cart' : 'Produk berhasil ditambahkan ke keranjang');
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1'
        ]);

        Cart::where('customer_id', Auth::guard('customer')->user()->id)->where('product_id', $request->product_id)->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Cart successfully updated' : 'Keranjang berhasil diperbarui');
    }

    public function deleteCart($id)
    {
        Cart::where('customer_id', Auth::guard('customer')->user()->id)->where('product_id', $id)->delete();

        $cart_counts = Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() ? Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() : 0;
        session(['cart_counts' => $cart_counts]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Product successfully removed to cart' : 'Produk berhasil dihapus dari keranjang');
    }
}
