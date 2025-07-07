<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Bank;
use App\Mail\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->query('slug');
        $bank = Bank::latest()->get();
        $product = Product::with('topupOptions')->where('slug', $slug)->firstOrFail();

        return view('frontend.orders.index', compact('bank', 'product'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'game_user_id' => 'required|string|max:50',
            'zone_id' => 'required|string|max:50',
            'jumlah' => 'required|exists:topups,id',
            'bank_id' => 'required|exists:banks,id',
        ]);

        $product = Product::where('slug', $request->slug)->firstOrFail();

        $order = Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'topup_id' => $request->jumlah,
            'bank_id' => $request->bank_id,
            'game_user_id' => $request->game_user_id,
            'zone_id' => $request->zone_id,
            'invoice' => strtoupper(uniqid('INV-')),
            'status' => 'pending',
        ]);

        Mail::to(auth()->user()->email)->send(new Invoice($order));

        // Menampilkan pesan sukses
        if ($order) {
            toastr()->success('Pesanan berhasil dibuat! Silakan cek email Anda untuk detail transaksi.');
            return redirect()->route('frontend.transactions.index');
        } else {
            toastr()->error('Gagal membuat order. Silakan coba lagi.');
            return redirect()->back();
        }
    }
}
