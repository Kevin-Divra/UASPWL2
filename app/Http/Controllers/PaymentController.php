<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;



class PaymentController extends Controller
{
    public function index() : View
    {
        $payment = new Payment;
        $payments = $payment->get_payment()
                            ->latest()
                            ->paginate(10);
    
        return view('payment.index', compact('payments'));    
    }
    
    /**
     * show
     * 
     * @param mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $data = (new Payment())->get_payment()->where('payment.id', $id)->firstOrFail();

        return view('payment.show', compact('data'));
    }

    /**
     * edit
     * 
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $payment = new Payment;
        $data['payments'] = $payment->get_payment()->where('payment.id', $id)->firstOrFail();

        return view('payment.edit', compact('data'));
    }
    
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:success,fail,ongoing',  // Validating the status input
        ]);

        // Find the payment by ID (not the order)
        $payment = Payment::findOrFail($id);

        // Update the payment status
        $payment->status = $request->input('status');
        $payment->save();

        if ($payment->status === 'success') {
            $orderId = $payment->id_order;
            $userEmail = $payment->user->email;  // Adjust based on your relationship
    
            $this->sendEmail($userEmail, $orderId);

            Shipping::create([
                'id_payment' => $payment->id, // Link to the payment
                'status' => 'ongoing',       // Default status for new shipping
            ]);
        }
        // Redirect to the payment index page after successful update
        return redirect()->route('payment.index')->with('success', 'Payment status updated successfully!');
    }

    private function sendEmail($to, $id){
        try {
            $order = new Order;
            $data = $order->get_order()->where('order.id', $id)->firstOrFail();
    
            $total_harga['order'] = $data->total_transaction;
            
            $order_entry = [
                'data' => $data,
                'total_harga' => $total_harga,

            ];
    
            Mail::send('order.show', $order_entry, function ($message) use ($to) {
                $message->to($to)
                    ->subject('Thank You For Your Purchase - Your Order Will Arrive in 1 Week!');
            });
    
            return response()->json(['message' => 'Email sent successfully!']);
            
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
    
            return response()->json(['message' => 'Failed to send email. Please try again later.'], 500);
            }
        }
    
}