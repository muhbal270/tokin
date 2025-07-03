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
        return view('backend.banks.index', compact('banks')); // compact digunakan untuk mengirim data ke view
    }

    public function create()
    {
        return view('backend.banks.create');
    }

    public function edit(Bank $bank)
    {
        return view('backend.banks.edit', compact('bank'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ], [
            'bank_name.required' => 'Nama bank harus diisi.',
            'account_number.required' => 'Nomor rekening harus diisi.',
            'account_name.required' => 'Nama pemilik rekening harus diisi.',
            'image.required' => 'Logo bank harus diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, svg, atau webp.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'image.dimensions' => 'Gambar harus memiliki dimensi yang valid.',
        ]);

        // Simpan gambar ke storage
        $image = $request->file('image'); // merupakan file yang diunggah
        $image_name = time() . '.' . $image->getClientOriginalExtension(); // nama file dengan timestamp
        $image->move((public_path('storage/banks')), $image_name); 

        Bank::create([
            'bank_name' => $request->bank_name, // simpan nama bank
            'account_number' => $request->account_number, // simpan nomor rekening
            'account_name' => $request->account_name, // simpan nama pemilik rekening
            'image' => $image_name, // simpan nama file gambar
        ]);

        // menampilkan pesan sukses
        if ($request) {
            toastr()->success('Bank berhasil ditambahkan!');
            return redirect()->route('backend.bank.index');
        } else {
            toastr()->error('Gagal menambahkan bank!');
            return redirect()->back();
        }
    }

    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ],
        [
            'bank_name.required' => 'Nama bank harus diisi.',
            'account_number.required' => 'Nomor rekening harus diisi.',
            'account_name.required' => 'Nama pemilik rekening harus diisi.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, svg, atau webp.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image'); // merupakan file yang diunggah
            $image_name = time() . '.' . $image->getClientOriginalExtension(); // nama file dengan timestamp
            $image->move((public_path('storage/banks')), $image_name); // simpan gambar ke direktori storage/banks
            $bank->image = $image_name; // update nama file gambar
        }

        $bank->bank_name = $request->bank_name; // update nama bank
        $bank->account_number = $request->account_number; // update nomor rekening
        $bank->account_name = $request->account_name; // update nama pemilik rekening
        $bank->save(); // simpan perubahan ke database

        // menampilkan pesan sukses
        if ($bank) {
            toastr()->success('Bank berhasil diperbarui!');
            return redirect()->route('backend.bank.index');
        } else {
            toastr()->error('Gagal memperbarui bank!');
            return redirect()->back();
        }
    }

    public function destroy(Bank $bank)
    {
        // Hapus data bank dari database
        $bank->delete();

        // menampilkan pesan sukses
        if ($bank) {
            toastr()->success('Bank berhasil dihapus!');
            return redirect()->route('backend.bank.index');
        } else {
            toastr()->error('Gagal menghapus bank!');
            return redirect()->back();
        }
    }
}
