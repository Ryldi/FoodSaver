<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use App\Models\Cart;
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

        TransactionController::setSnapToken($transaction);

        $cart_counts = Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() ? Cart::where('customer_id', Auth::guard('customer')->user()->id)->count() : 0;
        session(['cart_counts' => $cart_counts]); 

        return redirect()->route('transactionPage', ['id' => $transaction->id])->with('success', 'Transaksi berhasil dibuat, silahkan lakukan pembayaran untuk menyelesaikan transaksi');
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
                'gross_amount' => $transaction->total_price,
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
        $transaction->status = 'Paid';
        $transaction->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil dilakukan, silahkan menunggu konfirmasi dari restoran');
    }

    public function orderList()
    {
        $transactions = TransactionHeader::with(['customer', 'details.product.restaurant'])
                        ->where('status', '!=', 'Unpaid')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('pages.orderList', compact('transactions'));
    }

    public function prepareOrder($id) {
        $transaction = TransactionHeader::with('details.product.restaurant')->where('id', $id)->first();
        $transaction->status = 'Prepared';
        $transaction->save();

        return redirect()->back()->with('success', 'Status produk berhasil diperbarui, silahkan siapkan pesanan milik pelanggan');
    }

    public function completeOrder($id) {
        $transaction = TransactionHeader::with('details.product.restaurant')->where('id', $id)->first();
        $transaction->status = 'Completed';
        $transaction->save();

        return redirect()->back()->with('success', 'Pesanan berhasil diselesaikan');
    }
}
