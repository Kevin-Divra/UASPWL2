@extends('layouts.app-public')
@section('title', 'Shop')
@section('content')
    <!-- Product Area Start -->
    <div class="">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center mb-4">Search and Filter Products</h2>
        <div class="input-group d-flex justify-content-center mb-4">
            <form action="{{ route('user.shop.query') }}" method="GET" class="d-flex">
                <!-- Search input -->
                <input type="text" name="query" class="form-control mr-2" 
                    placeholder="Search products..." value="{{ request()->input('query') }}">

                <!-- Category filter -->
                <select name="category" class="custom-select mx-2">
                    <option value="">All Categories</option>
                    <option value="Laptop" {{ request()->input('category') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                    <option value="Camera" {{ request()->input('category') == 'Camera' ? 'selected' : '' }}>Camera</option>
                    <option value="Powerbank" {{ request()->input('category') == 'Powerbank' ? 'selected' : '' }}>Powerbank</option>
                </select>

                <!-- Sort by options -->
                <select name="sort_by" class="custom-select mr-2">
                    <option value="title" {{ request()->input('sort_by') == 'title' ? 'selected' : '' }}>Sort by Name</option>
                    <option value="price" {{ request()->input('sort_by') == 'price' ? 'selected' : '' }}>Sort by Price</option>
                </select>

                <!-- Sort direction -->
                <select name="sort_direction" class="custom-select mx-2">
                    <option value="asc" {{ request()->input('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request()->input('sort_direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>

                <!-- Submit button -->
                <button class="btn btn-dark mr-2" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>


<div class="container px-4 px-lg-5 mt-5 min-vh-100">
    <h2 class="text-center mb-4">Products</h2>
    @if($data['products']->isEmpty())
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-light">
                <div class="card-body text-center">
                    <p class="card-text mt-2 mb-2">Sorry, there are no products available in this category. Please try browsing other categories or come back later.</p>
                    <a href="{{ route('user.home') }}" class="btn btn-dark mt-4 mb-4">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach ($data['products'] as $product)
            <div class="col mb-5">
                <div class="card h-100 shadow-sm border-1 rounded-4">
                    <!-- Product Image -->
                    <a href="{{ route('pdp', ['id' => $product->id]) }}" class="d-block position-relative overflow-hidden">
                        <img class="card-img-top img-fluid" 
                            src="{{ asset('storage/images/' . $product->image) }}" 
                            alt="{{ $product->name }}" 
                            style="height: 250px; object-fit: cover;">
                    </a>

                    <!-- Product Details -->
                    <div class="card-body">
                        <h6 class="card-title fw-bold mb-1">{{ ucwords($product->title) }}</h6>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="text-success fw-bold mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Stock: {{ $product->stock }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="card-footer bg-transparent border-0">
                        <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark w-100 rounded-pill">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    @endif
</div>

@endsection
