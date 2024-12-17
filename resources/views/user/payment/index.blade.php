@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment</h1>
        
        <!-- Menampilkan Produk yang akan dibayar -->
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->product->price, 2, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->total, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Pembayaran -->
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <h3>Total: Rp {{ number_format($totalPrice, 2, ',', '.') }}</h3>
            </div>
        </div>

        <!-- Form untuk Pembayaran -->
        <div class="mt-4">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Confirm Payment</button>
            </form>
        </div>
    </div>
@endsection
