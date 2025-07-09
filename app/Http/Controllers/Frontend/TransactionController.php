<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $orders = Order::with(['topup', 'product'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.transactions.index', compact('orders'));
    }

    public function showUploadForm(Order $order)
    {
        return view('frontend.payments.index', compact('order'));
    }

    public function uploadPaymentProof(Request $request, Order $order)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('payment_proof')->store('proofs', 'public');

        $order->update([
            'payment_proof' => $path,
            'status' => 'paid', // Update status to paid after uploading proof
        ]);

        toastr('Bukti pembayaran berhasil diupload. Menunggu verifikasi.', 'success');
        return redirect()->route('frontend.success.index');
    }
}
