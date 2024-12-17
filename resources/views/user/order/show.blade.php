<!-- resources/views/user/order/show.blade.php -->
<!-- resources/views/user/order/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Details for User</h1>
        <p>Order ID: {{ $data->id }}</p>
        <p>Total Order: Rp {{ number_format($data->total_price, 2, ',', '.') }}</p>

        <h3>Product Details:</h3>
        <ul>
            @foreach($data->orderDetails as $detail)
                <li>{{ $detail->product->title }} - Quantity: {{ $detail->quantity }} - Subtotal: Rp {{ number_format($detail->subtotal, 2, ',', '.') }}</li>
            @endforeach
        </ul>
    </div>
@endsection


@push('scripts')
<!-- Menambahkan SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Tombol untuk memicu popup pembayaran
    document.getElementById('payButton').addEventListener('click', function() {
        Swal.fire({
            title: 'Enter Payment Details',
            html:
                '<input id="card_number" class="swal2-input" placeholder="Card Number">' +
                '<input id="expiry_date" class="swal2-input" placeholder="Expiry Date">' +
                '<input id="cvv" class="swal2-input" placeholder="CVV">',
            focusConfirm: false,
            preConfirm: () => {
                const cardNumber = document.getElementById('card_number').value;
                const expiryDate = document.getElementById('expiry_date').value;
                const cvv = document.getElementById('cvv').value;
                if (!cardNumber || !expiryDate || !cvv) {
                    Swal.showValidationMessage('Please enter all fields');
                } else {
                    // Kirim data pembayaran ke server atau lakukan proses pembayaran
                    Swal.fire('Payment Completed!', 'Your payment was successful.', 'success');
                }
            }
        });
    });
</script>
@endpush
