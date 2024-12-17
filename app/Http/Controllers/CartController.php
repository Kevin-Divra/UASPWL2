<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        // Get the cart for the authenticated user (if exists)
        $cart = Cart::where('id_user', auth()->id())->first();

        if ($cart) {
            // Load the cart details for the current cart, along with product data
            $cartItems = $cart->cartDetails()->with('product')->get();
        } else {
            $cartItems = collect(); // Empty collection if no cart found
        }

        return view('user.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        // Find or create the user's cart
        $cart = Cart::firstOrCreate(['id_user' => auth()->id()]);

        // Create a new cart detail (item)
        $cart->cartDetails()->create([
            'id_product' => $request->product_id,
            'id_quantity' => $request->quantity
        ]);

        return redirect()->route('user.cart')->with('success', 'Product added to cart.');
    }

    // public function removeFromCart($cartDetailId)
    // {
    //     // Find and delete the cart detail
    //     $cartDetail = CartDetail::findOrFail($cartDetailId);
    //     $cartDetail->delete();

    //     return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    // }

    // public function updateQuantity(Request $request, $cartDetailId)
    // {
    //     // Update product quantity in the cart
    //     $cartDetail = CartDetail::findOrFail($cartDetailId);
    //     $cartDetail->update([
    //         'quantity' => $request->quantity,
    //     ]);

    //     return redirect()->route('cart.index')->with('success', 'Cart updated.');
    // }
}
