<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan daftar topup
        return view('backend.topups.index');
    }

    public function create()
    {
        // Logika untuk menampilkan form tambah topup
        return view('backend.topups.create');
    }

    public function edit()
    {
        // Logika untuk menampilkan form edit topup
        return view('backend.topups.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'title' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'position' => 'required|integer|min:0',
        ], [
            'product_id.required' => 'Produk harus dipilih.',
            'title.required' => 'Judul topup harus diisi.',
            'jumlah.required' => 'Jumlah topup harus diisi.',
            'price.required' => 'Harga topup harus diisi.',
        ]);
    }

    public function update(Request $request, )
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'title' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'position' => 'required|integer|min:0',
        ], [
            'product_id.required' => 'Produk harus dipilih.',
            'title.required' => 'Judul topup harus diisi.',
            'jumlah.required' => 'Jumlah topup harus diisi.',
            'price.required' => 'Harga topup harus diisi.',
        ]);
    }

}
