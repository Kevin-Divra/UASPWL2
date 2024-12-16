<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /* 
    * index
    * @return void
    */

    public function index() : View
    {
        $order = new Order;
        $orders = $order->get_order()
                            ->latest()
                            ->paginate(10);
    
        return view('order.index', compact('orders'));    
    }
    
    /* 
    * create
    *
    * @return View
    */

    public function create() : View
    {
        $order = new Order;
        $product = new Product;

        $data['products'] = $product->get_product()->get();

        return view('order.create', compact('data'));    
    }

    /**
     * Store a new transaction and reduce product stock.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'id_product' => 'required|array|min:1',
            'id_product.*' => 'required|exists:products,id',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer|min:1',
            'buyer_email' => 'required|email', // buyer_email should be validated
        ]);
    
        DB::beginTransaction(); // Start a transaction to ensure all operations succeed or fail together
    
        try {
            // Find the user by email
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
    
            DB::commit(); // Commit the transaction
    
            // Send email after the order is successfully created
            $this->sendEmail($request->buyer_email, $order->id);
    
            return redirect()->route('order.index')->with(['success' => 'Order successfully created and stock updated!']);
            
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback on error
            return redirect()->back()->withErrors(['error' => 'Failed to create order. Error: ' . $e->getMessage()]);
        }
    }    
    

    /**
     * show
     * 
     * @param mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $data = (new Order())->get_order()->where('order.id', $id)->firstOrFail();

        return view('order.show', compact('data'));
    }
    
    /**
     * edit
     * 
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $order = new Order;
        $product = new Product;
        $data['orders'] = $order->get_order()->where('order.id', $id)->firstOrFail();
        $data['products'] = $product->get_product()->get();

        return view('order.edit', compact('data'));
    }
    
    /**
     * Update
     * 
     * @param  Request $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate the form input
        $request->validate([
            'id_product' => 'required|array|min:1',
            'id_product.*' => 'required|exists:products,id',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer|min:1',
            'buyer_email' => 'required|email', // buyer_email should be validated
        ]);
    
        DB::beginTransaction(); // Start the transaction
    
        try {
            // Retrieve the existing order details
            $existingDetails = DB::table('order_detail')->where('id_order', $id)->get();
    
            // Restore the stock based on the previous order details
            foreach ($existingDetails as $detail) {
                DB::table('products')->where('id', $detail->id_product)->increment('stock', $detail->quantity);
            }
    
            // Delete the existing order details
            DB::table('order_detail')->where('id_order', $id)->delete();
    
            $products = $request->input('id_product');
            $quantities = $request->input('quantity');
    
            $total = 0; // Initialize total amount
    
            foreach ($products as $index => $product_id) {
                $product = DB::table('products')->where('id', $product_id)->first();
    
                // Check if stock is sufficient
                if ($product->stock < $quantities[$index]) {
                    return redirect()->back()->withErrors(['error' => 'Stock for ' . $product->title . ' is insufficient.']);
                }
    
                // Calculate the subtotal
                $subtotal = $product->price * $quantities[$index];
                $total += $subtotal;
    
                // Update the product stock
                DB::table('products')->where('id', $product_id)->decrement('stock', $quantities[$index]);
    
                // Insert new transaction detail with subtotal
                DB::table('order_detail')->insert([
                    'id_order' => $id,
                    'id_product' => $product_id,
                    'quantity' => $quantities[$index],
                    'subtotal' => $subtotal, // Save the subtotal
                ]);
            }
    
            // Update the total transaction amount in the 'order' table
            DB::table('order')->where('id', $id)->update([
                'total_price' => $total,
                'updated_at' => now(),
            ]);
    
            DB::commit(); // Commit the transaction
    
            // Send email after updating transaction
            $this->sendEmail($request->input('buyer_email'), $id);
    
            return redirect()->route('order.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (\Exception $e) {
            DB::rollback(); // Rollback the transaction if there's an error
            Log::error($e->getMessage());
    
            return redirect()->route('order.index')->with(['error' => 'Failed to save data.']);
        }
    }
    
    

        
    /**
    * destroy
    * 
    * @param mixed $id
    * @return RedirectResponse
    */

    public function destroy($id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        DB::table('order_detail')->where('id_order', $order->id)->delete();
        $order->delete();

        return redirect()->route('order.index')->with(['success' => 'Data Berhasil Dihapus!']);
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