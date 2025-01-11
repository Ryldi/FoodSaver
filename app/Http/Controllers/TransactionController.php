<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use App\Models\Notification;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CustomerCoupon;
use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // dd(Auth::guard('customer')->user()->id);
        $transactions = TransactionHeader::with('details.product.restaurant')->where('customer_id', Auth::guard('customer')->user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.transactionList', compact('transactions'));
    }
    public function checkout(Request $request)
    {
        $transaction = null;
        if($request->coupon_id != null) {
            $coupon = Coupon::find($request->coupon_id);

            $discount_price = $request->total_price * $coupon->percent / 100;
            if($discount_price > $coupon->max_disc) {
                $discount_price = $coupon->max_disc;
            }

            $transaction = TransactionHeader::create([
                'customer_id' => Auth::guard('customer')->user()->id,   
                'status' => 'Unpaid',
                'total_price' => $request->total_price,
                'discount_price' => $discount_price,
                'coupon_id' => $request->coupon_id
            ]);
        }else{
            $transaction = TransactionHeader::create([
                'customer_id' => Auth::guard('customer')->user()->id,   
                'status' => 'Unpaid',
                'total_price' => $request->total_price
            ]);
        }

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

        CustomerCoupon::where('customer_id', Auth::guard('customer')->user()->id)
              ->where('coupon_id', $transaction->coupon_id)
              ->increment('is_used', 1, ['updated_at' => now()]);

        TransactionController::setSnapToken($transaction);

        $cart_counts = Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() ? Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() : 0;
        session(['cart_counts' => $cart_counts]); 

        return redirect()->route('transactionPage', ['id' => $transaction->id])->with('success', (session()->get('locale') === 'en') ? 'Transaction successfully created, please make payment to complete the transaction' : 'Transaksi berhasil dibuat, silahkan lakukan pembayaran untuk menyelesaikan transaksi');
    }

    public function getTransaction($id)
    {
        $transaction = TransactionHeader::with('details.product.restaurant')->where('id', $id)->first();
        // dd($transaction);
        try {
            TransactionController::setSnapToken($transaction);
        } catch (\Throwable $th) {
        }
        return view('pages.transactionDetail', compact('transaction'));
    }

    public static function setSnapToken(TransactionHeader $transaction)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->id,
                'gross_amount' => $transaction->total_price - $transaction->discount_price,
            ),
            'customer_details' => array(
                'first_name' => Auth::guard('customer')->user()->name,
                'email' => Auth::guard('customer')->user()->email,
                'phone' => Auth::guard('customer')->user()->phone
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction->snap_token = $snapToken;
        $transaction->save();
    }

    public function paymentSuccess($id)
    {
        $transaction = TransactionHeader::with('details.product.restaurant')->where('id', $id)->first();
        foreach ($transaction->details as $detail) {
            $product = $detail->product;
            $product->stock = $product->stock - $detail->quantity;
            $product->save();
        }

        $transaction->status = 'Paid';
        $transaction->save();

        Notification::create([
            'transaction_id' => $transaction->id,
            'status' => 'income_order'
        ]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Payment successfully made, please wait for confirmation from the restaurant' : 'Pembayaran berhasil dilakukan, silahkan menunggu konfirmasi dari restoran');
    }

    public function orderList()
    {
        $transactions = TransactionHeader::with(['customer', 'details.product.restaurant'])
                        ->where('status', '!=', 'Unpaid')
                        ->whereHas('details.product.restaurant', function ($query) {
                            $query->where('id', '=', Auth::guard('restaurant')->user()->id);
                        })
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('pages.orderList', compact('transactions'));
    }

    public function prepareOrder($id) {
        $transaction = TransactionHeader::with('details.product.restaurant')->where('id', $id)->first();
        $transaction->status = 'Prepared';
        $transaction->save();

        Notification::create([
            'transaction_id' => $transaction->id,
            'status' => 'prepare_order'
        ]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Product status successfully updated, please prepare the order of the customer' : 'Status produk berhasil diperbarui, silahkan siapkan pesanan milik pelanggan');
    }

    public function completeOrder($id) {
        $transaction = TransactionHeader::with('details.product.restaurant')->where('id', $id)->first();
        $transaction->status = 'Completed';
        $transaction->save();

        Notification::create([
            'transaction_id' => $transaction->id,
            'status' => 'complete_order'
        ]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Order successfully completed' : 'Pesanan berhasil diselesaikan');
    }

    public function reviewOrder(Request $request, $id) {

        $transaction = TransactionHeader::with('details.product.restaurant')->where('id', $id)->first();

        $rating = 0;
        try {
            $transactions = TransactionHeader::where('status', 'Reviewed')->get();
            $restaurant_rating = $transactions->first()->details->first()->product->restaurant->rating;
            $reviewed = $transactions->count();
            $total_rating = $restaurant_rating + $request->rating;
            $rating = $total_rating / ($reviewed + 1);
        } catch (\Throwable $th) {
            $rating = $request->rating;
        }

        Review::create([
            'transaction_id' => $id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        $transaction->status = 'Reviewed';
        $transaction->save();

        $restaurant = Restaurant::where('id', $transaction->details->first()->product->restaurant->id)->first();
        $restaurant->rating = $rating;
        $restaurant->save();

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Order successfully reviewed' : 'Pesanan berhasil direview');
    }
}
