<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        
        if (Auth::guard('customer')->check()) {
            $user_id = Auth::guard('customer')->user()->id;
            $cart_counts = Cart::where('customer_id', $user_id)->count() ? Cart::where('customer_id', $user_id)->count() : 0;
            session(['cart_counts' => $cart_counts]);
            $notifications = Notification::with('transaction.customer', 'transaction.details.product.restaurant')
                ->orderBy('created_at', 'desc')
                ->get()
                ->filter(function ($notification) use ($user_id) {
                    return $notification->transaction->customer_id === $user_id;
                })
                ->map(function ($notification) {
                    return [
                        'transaction_id' => $notification->transaction->id,
                        'restaurant_name' => $notification->transaction->details->first()->product->restaurant->name,
                        'created_at' => $notification->created_at,
                        'status' => $notification->status
                    ];
                });
            session(['notifications' => $notifications]);
        }
        else if(Auth::guard('restaurant')->check()){
            $restaurant_id = Auth::guard('restaurant')->user()->id;
            $notifications = Notification::with('transaction.customer', 'transaction.details.product.restaurant')
                ->orderBy('created_at', 'desc')
                ->get()
                ->filter(function ($notification) use ($restaurant_id) {
                    return $notification->transaction->details->first()->product->restaurant->id === $restaurant_id;
                })
                ->map(function ($notification) {
                    return [
                        'transaction_id' => $notification->transaction->id,
                        'customer_name' => $notification->transaction->customer->name,
                        'created_at' => $notification->created_at,
                        'status' => $notification->status
                    ];
                });
            session(['notifications' => $notifications]);
        }

        return session('notifications');
    }
}
