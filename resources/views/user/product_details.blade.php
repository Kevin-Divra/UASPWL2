@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/images/'.$product->image) }}" class="img-fluid" alt="{{ $product->title }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->title }}</h2>
            <p>{{ $product->description }}</p>
            <p><strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
            <a href="{{ route('shop.index') }}" class="btn btn-secondary">Back to Shop</a>
        </div>
    </div>
</div>
@endsection
