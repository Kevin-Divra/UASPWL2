<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller
{
    // Show checkout page with cart items and total amount
    public function index()
    {
        // Get the user's cart, assuming the Cart model and relationships are set up
        $cart = Cart::where('id_user', auth()->id())->first();
    
        $cartItems = $cart->cartDetails; // Assuming cartDetails is the relationship with CartDetail
    
        // Pass cart items to the checkout view
        return view('user.checkout', compact('cartItems'));
    }
    

    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'id_product' => 'required|array|min:1',
            'id_product.*' => 'required|exists:products,id',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer|min:1',
            'buyer_email' => 'required|email',
        ]);
    
        DB::beginTransaction(); // Start a transaction to ensure all operations succeed or fail together
    
        try {
            // Find the user by email (No need to check if the email exists, since it's coming from logged-in user)
            $user = User::where('email', $request->buyer_email)->first();
    
            // If the user does not exist, return an error
            if (!$user) {
                return redirect()->back()->withErrors(['error' => 'User with the given email does not exist.']);
            }
    
            // Create the transaction in the order table
            $order = new Order();
            $order->id_user = $user->id; // Link the order to the user via user ID
            $order->total_price = 0; // Initialize total price (you can calculate this based on the products)
            $order->save();
    
            $totalPrice = 0; // Variable to calculate the total price of the order
    
            // Loop through each product and its quantity
            foreach ($request->id_product as $index => $productId) {
                $product = Product::findOrFail($productId);
    
                // Check if stock is sufficient
                if ($product->stock < $request->quantity[$index]) {
                    return redirect()->back()->withErrors(['error' => 'Stock for ' . $product->title . ' is insufficient.']);
                }
    
                // Calculate the subtotal for this product
                $subtotal = $product->price * $request->quantity[$index];
                $totalPrice += $subtotal;
    
                // Update product stock
                $product->stock -= $request->quantity[$index];
                $product->save();
    
                // Insert into order_detail table
                DB::table('order_detail')->insert([
                    'id_order' => $order->id,
                    'id_product' => $productId,
                    'quantity' => $request->quantity[$index],
                    'subtotal' => $subtotal,
                ]);
            }
    
            // Update the total price of the order
            $order->total_price = $totalPrice;
            $order->save();
    
            // Create the payment linked to the newly created order
            $payment = Payment::create([
                'id_order' => $order->id,
                'id_user' => $user->id,
                'status' => 'ongoing', // Set payment status to pending
            ]);
    
            DB::commit(); // Commit the transaction
    
            // Send email after the order is successfully created (you can send the email here)
            $this->sendEmail($request->buyer_email, $order->id);
    
            return redirect()->route('user.shop')->with(['success' => 'Order successfully created!']);
    
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback on error
            return redirect()->back()->withErrors(['error' => 'Failed to create order. Error: ' . $e->getMessage()]);
        }
    }

    private function sendEmail($to, $id){
        try {
            $order = new Order;
            $data = $order->get_order()->where('order.id', $id)->firstOrFail();
    
            $total_harga['order'] = $data->total_transaction;
            
            $order_entry = [
                'data' => $data,
                'total_harga' => $total_harga
            ];
    
            Mail::send('order.show', $order_entry, function ($message) use ($to, $data, $total_harga) {
                $message->to($to)
                    ->subject('Order Details: ' . $data->buyer_email . ' dengan Total tagihan Rp ' . number_format($total_harga['order'], 2, ',', '.'));
            });
    
            return response()->json(['message' => 'Email sent successfully!']);
            
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
    
            return response()->json(['message' => 'Failed to send email. Please try again later.'], 500);
        }
        }
    

}
