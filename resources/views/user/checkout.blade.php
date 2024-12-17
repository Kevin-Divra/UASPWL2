@extends('layouts.app-public')

@section('title', 'Checkout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3>Checkout</h3>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form id="transactionForm" action="{{ route('user.checkout.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Buyer Email -->
                        <div class="form-group mb-4">
                            <label for="buyer_email">Email</label>
                            <input type="email" name="buyer_email" id="buyer_email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        </div>

                        <!-- Table for Cart Items -->
                        <h5>Cart Items</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0; // To calculate total price
                                @endphp

                                @foreach ($cartItems as $item)
                                    @php
                                        $subtotal = $item->product->price * $item->quantity; // Calculate subtotal
                                        $totalPrice += $subtotal; // Add to total price
                                    @endphp
                                    <tr>
                                        <!-- Product Name -->
                                        <td>
                                            {{ ucwords($item->product->title) }}
                                            <input type="hidden" name="id_product[]" value="{{ $item->product->id }}">
                                        </td>
                                        <!-- Price -->
                                        <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                                        <!-- Quantity -->
                                        <td>
                                            {{ $item->quantity }}
                                            <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                                        </td>
                                        <!-- Subtotal -->
                                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Total Price -->
                        <div class="form-group mb-3">
                            <h4>Total: Rp {{ number_format($totalPrice, 0, ',', '.') }}</h4>
                        </div>

                        <div class="alert alert-danger" role="alert" style="background-color: #f8d7da; border-color: #f5c6cb; color: #721c24; font-size: 1.1rem;">
                            <strong>Important!</strong> Please pay <strong>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</strong> to <strong>BCA 123123123</strong> (Name: <strong>GGCORP</strong>), and send a screenshot of the proof to <strong>081231231231</strong> so we can complete your order. <br> Thank you!
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-primary">Complete Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
