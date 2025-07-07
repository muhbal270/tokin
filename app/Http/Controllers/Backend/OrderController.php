<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product', 'topup', 'bank'])->latest()->paginate(10);

        return view('backend.orders.index' , compact('orders')); 
    }
}
