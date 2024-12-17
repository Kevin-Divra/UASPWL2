<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Menampilkan produk dengan pagination
    public function index()
    {
        // Ambil produk dengan pagination 10 per halaman
        $products = Product::paginate(10);
        return view('user.shop', compact('products'));
    }

    // API untuk mengambil produk via AJAX
    public function fetchProducts(Request $request)
    {
        // Ambil produk dengan pagination 10 per halaman
        $products = Product::paginate(10);

        // Kembalikan response berupa view produk yang sudah di-render dan pagination
        return response()->json([
            'products' => view('partials.products', compact('products'))->render(),
            'pagination' => (string) $products->links() // Link pagination
        ]);
    }

    public function show($id)
    {
    // Ambil produk berdasarkan ID
    $product = Product::findOrFail($id);
    return view('user.product_details', compact('product'));
        
    }
}
