<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions.
     *
     * @return View
     */
    public function index(): View
    {
        $transaction = new Transaction;
        $transactions = $transaction->get_transaction()
                            ->latest()
                            ->paginate(10);
    
        return view('transactions.index', compact('transactions'));    
    }
    
    /**
     * Show the form for creating a new transaction.
     *
     * @return View
     */
    public function create(): View
    {
        $transaction = new Transaction;
        $product = new Product;

        $data['cashiers'] = $transaction->get_cashier()->get();
        $data['products'] = $product->get_product()->get();

        return view('transactions.create', compact('data'));    
    }

    /**
     * Store a newly created transaction in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_kasir_id' => 'required|exists:kasir,id',
            'id_product' => 'required|array|min:1',
            'id_product.*' => 'required|exists:products,id',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer|min:1',
            'email_pembeli' => 'required|email',
        ]);

        DB::beginTransaction();

        try {
            $transactionId = DB::table('transaksi_penjualan')->insertGetId([
                'id_kasir' => $request->input('nama_kasir_id'),
                'email_pembeli' => $request->input('email_pembeli'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $products = $request->input('id_product');
            $quantities = $request->input('quantity');

            foreach ($products as $index => $productId) {
                $product = Product::findOrFail($productId);

                if ($product->stock < $quantities[$index]) {
                    return redirect()->back()->withErrors(['error' => 'Stock for ' . $product->title . ' is insufficient.']);
                }

                $product->stock -= $quantities[$index];
                $product->save();

                DB::table('detail_transaksi_penjualan')->insert([
                    'id_transaksi_penjualan' => $transactionId,
                    'id_product' => $productId,
                    'jumlah_pembelian' => $quantities[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $this->sendEmail($request->input('email_pembeli'), $transactionId);
            DB::commit();

            return redirect()->route('transaction.index')->with(['success' => 'Transaction successfully created and stock updated!']);
        
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to create transaction.']);
        }
    }

    /**
     * Display the specified transaction.
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        $transaction = new Transaction;
        $data = $transaction->get_transaction()->where('transaksi_penjualan.id', $id)->firstOrFail();
    
        return view('transactions.show', compact('data'));
    }
    
    /**
     * Show the form for editing the specified transaction.
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $transaction = new Transaction;
        $product = new Product;
        $data['transactions'] = $transaction->get_transaction()->where('transaksi_penjualan.id', $id)->firstOrFail();
        $data['cashiers'] = $transaction->get_cashier()->get();
        $data['products'] = $product->get_product()->get();

        return view('transactions.edit', compact('data'));
    }

    /**
     * Update the specified transaction in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_kasir_id' => 'required|exists:kasir,id',
            'id_product' => 'required|array|min:1',
            'id_product.*' => 'required|exists:products,id',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer|min:1',
            'email_pembeli' => 'required|email',
        ]);

        DB::beginTransaction();

        try {
            DB::table('transaksi_penjualan')->where('id', $id)->update([
                'id_kasir' => $request->input('nama_kasir_id'),
                'updated_at' => now(),
            ]);

            DB::table('detail_transaksi_penjualan')->where('id_transaksi_penjualan', $id)->delete();

            $products = $request->input('id_product');
            $quantities = $request->input('quantity');

            foreach ($products as $index => $productId) {
                DB::table('detail_transaksi_penjualan')->insert([
                    'id_transaksi_penjualan' => $id,
                    'id_product' => $productId,
                    'jumlah_pembelian' => $quantities[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $this->sendEmail($request->input('email_pembeli'), $id);
            DB::commit();

            return redirect()->route('transaction.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());

            return redirect()->route('transaction.index')->with(['error' => 'Failed to save data.']);
        }
    }
        
    /**
     * Remove the specified transaction from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $transaction = Transaction::findOrFail($id);
        DB::table('detail_transaksi_penjualan')->where('id_transaksi_penjualan', $transaction->id)->delete();
        $transaction->delete();

        return redirect()->route('transaction.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * Send transaction details via email.
     *
     * @param string $to
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    private function sendEmail(string $to, string $id)
    {
        try {
            $transaction = new Transaction;
            $data = $transaction->get_transaction()->where('transaksi_penjualan.id', $id)->firstOrFail();
            $total_harga = $data->total_transaction;
            
            $transaksi = [
                'data' => $data,
                'total_harga' => $total_harga,
            ];

            Mail::send('transactions.show', $transaksi, function ($message) use ($to, $data, $total_harga) {
                $message->to($to)
                    ->subject('Transaksi Details: ' . $data->email_pembeli . ' dengan Total tagihan Rp ' . number_format($total_harga, 2, ',', '.'));
            });

            return response()->json(['message' => 'Email sent successfully!']);
            
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to send email. Please try again later.'], 500);
        }
    }
}
