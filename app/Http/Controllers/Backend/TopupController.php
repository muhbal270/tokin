<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Topup;
use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function index()
    {
        // Mengambil semua data topup dari database
        $topups = Topup::with('product')->orderBy('position')->paginate(10);
        return view('backend.topups.index' , compact('topups'));
    }

    public function create()
    {
        $products = Product::all();
        return view('backend.topups.create', compact('products'));
    }

    public function edit(Topup $topup)
    {
        $products = Product::all();
        return view('backend.topups.edit',compact('products', 'topup'));
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

        Topup::create([
            'product_id' => $request->product_id,
            'title' => $request->title,
            'jumlah' => $request->jumlah,
            'price' => $request->price,
            'position' => $request->position,
        ]);

        // menampilkan pesan sukses
        if ($request) {
            toastr()->success('Produk berhasil ditambahkan!');
            return redirect()->route('backend.topup.index');
        } else {
            toastr()->error('Gagal menambahkan produk!');
            return redirect()->back();
        }
    }

    public function update(Request $request, Topup $topup)
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

        $updated = $topup->update([
            'product_id' => $request->product_id,
            'title' => $request->title,
            'jumlah' => $request->jumlah,
            'price' => $request->price,
            'position' => $request->position,
        ]);

        // menampilkan pesan sukses
        if ($updated) {
            toastr()->success('Topup berhasil diperbarui!');
            return redirect()->route('backend.topup.index');
        } else {
            toastr()->error('Gagal memperbarui topup!');
            return redirect()->back();
        }
    }

    public function destroy(Topup $topup)
    {
        $topup->delete();

        // menampilkan pesan sukses
        if ($topup) {
            toastr()->success('Topup berhasil dihapus!');
            return redirect()->route('backend.topup.index');
        } else {
            toastr()->error('Gagal menghapus topup!');
            return redirect()->back();
        }
    }

}
