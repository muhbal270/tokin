<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $bank = Bank::latest()->get();

        return view('frontend.orders.index', compact('bank'));
    }
}
