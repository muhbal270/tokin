<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function index()
    {

        $products = Product::orderBY('id', 'ASC')->get();
        // Mengambil semua produk dari database dan mengurutkannya berdasarkan ID secara ascending
        
        return view('frontend.products.index', compact('products'));
        // Mengembalikan view 'frontend.products.index' dengan data produk yang telah diambil
    }
}
