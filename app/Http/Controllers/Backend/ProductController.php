<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function edit(Product $product)
    {
        return view('backend.products.edit', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
        ],
        [
            'image.required' => 'Gambar produk harus diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'title.required' => 'Judul produk harus diisi.',
            'title.string' => 'Judul produk harus berupa teks.',
            'title.max' => 'Judul produk tidak boleh lebih dari 255 karakter.',
        ]);

        // Simpan gambar ke storage
        $image = $request->file('image'); // merupakan file yang diunggah
        $image_name = time() . '.' . $image->getClientOriginalExtension(); // nama file dengan timestamp
        $image->move((public_path('storage/products')), $image_name); // simpan gambar ke direktori storage/products

        Product::create([
            'image' => $image_name, // simpan nama file gambar
            'title' => $request->title, // simpan judul produk
        ]);

        // menampilkan pesan sukses
        if ($request) {
            toastr()->success('Produk berhasil ditambahkan!');
            return redirect()->route('backend.product.index');
        } else {
            toastr()->error('Gagal menambahkan produk!');
            return redirect()->back();
        }
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
        ],
        [
            'title.required' => 'Judul produk harus diisi.',
        ]);

        $image_name = $product->image; // ambil nama file gambar yang sudah ada

        if ($request->hasFile('image')) {
            $imagePath = public_path('storage/products/' . $image_name);

            // Hapus gambar lama jika ada dan bukan folder
            if (!empty($product->image) && file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }

            // jika ada file gambar yang diunggah, simpan gambar baru
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move((public_path('storage/products')), $image_name);
        }

        $updated = $product->update([
            'image' => $image_name, // simpan nama file gambar
            'title' => $request->title, // simpan judul produk
        ]);

        // menampilkan pesan sukses
        if ($updated) {
            toastr()->success('Produk berhasil diperbarui!');
            return redirect()->route('backend.product.index');
        } else {
            toastr()->error('Gagal memperbarui produk!');
            return redirect()->back();
        }
    }

    public function destroy(Product $product)
    {
        // Hapus file gambar jika ada
        if (!empty($product->image)) {
            $imagePath = public_path('storage/products/' . $product->image);
            if (is_file($imagePath)) {
                unlink($imagePath); // hapus file gambar
            }
        }

        // Hapus produk dari database
        $deleted = $product->delete();

        // menampilkan pesan sukses
        if ($deleted) {
            toastr()->success('Produk berhasil dihapus!');
            return redirect()->route('backend.product.index');
        } else {
            toastr()->error('Gagal menghapus produk!');
            return redirect()->back();
        }
    }
}
