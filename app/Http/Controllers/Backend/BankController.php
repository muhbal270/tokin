<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks  = Bank::latest()->paginate(5);
        return view('backend.banks.index', compact('banks'));
    }

    public function create()
    {
        return view('backend.banks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'bank_name.required' => 'Nama bank harus diisi.',
            'account_number.required' => 'Nomor rekening harus diisi.',
            'account_name.required' => 'Nama pemilik rekening harus diisi.',
            'image.required' => 'Logo bank harus diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

    }
}
