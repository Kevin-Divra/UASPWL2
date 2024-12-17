@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Your Cart</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (!empty($cart))
        <table class="table table-hover table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $id => $item)
                    <tr>
                        <td><img src="{{ asset('storage/images/'.$item['image']) }}" width="70" class="img-fluid rounded"></td>
                        <td>{{ $item['title'] }}</td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php $total += $item['price'] * $item['quantity']; @endphp
                @endforeach
                <tr>
                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                    <td colspan="2"><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
    @else
        <p class="text-center">Your cart is empty!</p>
    @endif

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('shop.index') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left-circle"></i> Back to Shop
        </a>
        <a href="{{ route('user.payment') }}" class="btn btn-success">
            <i class="bi bi-credit-card"></i> Proceed to Payment
        </a>
    </div>
</div>
@endsection
