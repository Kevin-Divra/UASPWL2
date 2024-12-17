@extends('layouts.app-public')

@section('title', 'Shopping Cart')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Your Cart</h2>

@if ($cartItems->isEmpty())
    <div class="text-center my-5">
        <h3 class="display-4 text-muted mb-4">Your cart is empty!</h3>
        <p class="lead text-dark mb-4">It looks like you haven't added anything to your cart yet.</p>
        <a href="{{ route('user.shop') }}" class="btn btn-primary btn-lg">Continue shopping</a>
    </div>
@else
    <!-- Your cart items table goes here -->

            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>{{ $item->product->title ?? 'Product not found' }}</td>
                            <td>Rp {{ number_format($item->product->price ?? 0, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('user.cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 80px;">
                                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </form>
                            </td>
                            <td>Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('user.cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <h4>Total: Rp {{ number_format($cartItems->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                }), 0, ',', '.') }}</h4>
                <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
            </div>
        @endif
    </div>
@endsection
