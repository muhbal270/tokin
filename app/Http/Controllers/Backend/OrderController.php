<?php

namespace App\Http\Controllers\Backend;

use Mail;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\TransactionVerifiedMail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product', 'topup', 'bank'])->latest()->paginate(10);

        return view('backend.orders.index' , compact('orders')); 
    }

    public function verify(Order $order)
    {
        $order->update(['status' => 'verified']);

        Mail::to($order->user->email)->send(new TransactionVerifiedMail($order));

        toastr('Order berhasil diverifikasi.', 'success');
        return redirect()->route('backend.order.index');
    }
}
