<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
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
            return [
                'restaurant' => $group->first()->product->restaurant,
                'carts' => $group,
                'total_price' => $total,
                'coupons' => ($cart->product->restaurant->coupons) ? $cart->product->restaurant->coupons : null //ini masih ngambil coupon restaurant, bukan coupon customer
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

            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
        }

        Cart::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        $cart_counts = Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() ? Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() : 0;
        session(['cart_counts' => $cart_counts]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
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

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui');
    }

    public function deleteCart($id)
    {
        Cart::where('customer_id', Auth::guard('customer')->user()->id)->where('product_id', $id)->delete();

        $cart_counts = Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() ? Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() : 0;
        session(['cart_counts' => $cart_counts]);

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang');
    }
}
