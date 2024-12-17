<!-- resources/views/user/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Order (User View)</h1>
    <form method="POST" action="{{ route('order.store') }}">
        @csrf
        <div>
            <label for="product">Select Product</label>
            <select name="id_product[]">
                @foreach ($data['products'] as $product)
                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity[]" min="1">
        </div>

        <div>
            <label for="email">Buyer Email</label>
            <input type="email" name="buyer_email" required>
        </div>

        <div>
            <button type="submit">Place Order</button>
        </div>
    </form>

    <!-- Tombol Pembayaran -->
    <div style="margin-top: 20px;">
        <form action="{{ route('payment.initiate') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Proceed to Payment</button>
        </form>
    </div>
</div>
@endsection
