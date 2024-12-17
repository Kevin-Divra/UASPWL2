@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Payment Page</h1>
    <p>Detail Pembayaran</p>
    <!-- Misalnya form untuk pembayaran -->
    <form action="{{ route('payment.submit') }}" method="POST">
        @csrf
        <!-- Input untuk metode pembayaran, jumlah, dll -->
        <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
</div>
@endsection
