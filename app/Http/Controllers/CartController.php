<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan isi keranjang
    public function index()
    {
        $cart = session()->get('cart', []); // Ambil isi cart dari session
        return view('user.cart', compact('cart'));
    }

    // Menambahkan produk ke cart
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []); // Ambil isi cart dari session

        // Jika produk sudah ada di cart, tambahkan jumlahnya
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika produk belum ada, tambahkan produk ke cart
            $cart[$id] = [
                "title" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart); // Simpan kembali cart ke session
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Menghapus produk dari cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]); // Hapus produk dari cart
            session()->put('cart', $cart); // Update cart di session
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
}
