<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class PaymentController extends Controller
{
     // Method untuk menangani penyelesaian pembayaran
     public function submit(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'payment_method' => 'required|string',
            'order_id' => 'required|exists:orders,id',
            // validasi lain jika perlu
        ]);

        // Ambil order berdasarkan ID yang dikirimkan
        $order = Order::find($request->order_id);

        // Proses pembayaran (misalnya menggunakan API pembayaran atau metode lain)
        // Contoh: lakukan pembayaran di sini

        // Ubah status order setelah pembayaran sukses
        $order->status = 'paid'; // Misalnya, ubah status order menjadi 'paid'
        $order->save();

        // Redirect atau tampilkan konfirmasi pembayaran
        return redirect()->route('order.show', ['id' => $order->id])
             ->with('success', 'Payment successful!');
    }
 
    public function initiate(Request $request)
    {
        // Logika pembayaran bisa diletakkan di sini, seperti integrasi dengan Stripe atau PayPal
        // Di sini kita hanya akan redirect ke halaman pembayaran untuk saat ini

        // Redirect ke halaman pembayaran
        return redirect()->route('payment.page');
    }

    // Halaman untuk menampilkan formulir pembayaran (misalnya, form untuk Stripe atau PayPal)
    public function showPaymentPage()
    {
        return view('payment.page'); // Tampilan halaman pembayaran
    }

    public function index()
{
    // Kamu bisa mengambil data yang diperlukan untuk tampilan pembayaran
    return view('user.payment.page');
}

}

