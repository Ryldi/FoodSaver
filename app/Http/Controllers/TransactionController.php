<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function checkout(Request $request)
    {
        $transaction = TransactionHeader::create([
            'customer_id' => Auth::guard('customer')->user()->id,   
            'status' => 'Unpaid',
            'total_price' => $request->total_price
        ]);

        $carts = Cart::whereHas('product', function ($query) use ($request) {
            $query->where('restaurant_id', $request->restaurant_id);
        })->with('product')->get();

        foreach ($carts as $cart) {
            TransactionDetail::create([
                'product_id' => $cart->product_id,
                'transaction_id' => $transaction->id,
                'quantity' => $cart->quantity
            ]);

            Cart::where('product_id', $cart->product_id)->where('customer_id', Auth::guard('customer')->user()->id)->delete();
        }

        $cart_counts = Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() ? Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() : 0;
        session(['cart_counts' => $cart_counts]);

        return redirect()->back()->with('success', 'Checkout berhasil');
    }
}
