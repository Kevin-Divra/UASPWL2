@extends('layouts.app-public')
@section('title', 'Home')
@section('content')

<style>
    /* ========== Global Styles ========== */
    body {
        margin: 0;
        font-family: 'Roboto', sans-serif;
        background-color: #F6F6F6;
        color: #333;
    }
    a {
        text-decoration: none;
    }

    /* ========== Hero Section ========== */
    .hero-section {
        background: url('https://via.placeholder.com/1200x500') no-repeat center/cover;
        text-align: center;
        padding: 100px 20px;
        color: #fff;
    }
    .hero-section h1 {
        font-size: 2.5rem;
        font-weight: 700;
    }
    .hero-section p {
        font-size: 1rem;
        margin-bottom: 30px;
    }
    .hero-section button {
        background-color: #FFD700;
        color: #333;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
    }
    .hero-section button:hover {
        background-color: #FFB800;
    }

    /* ========== Categories Section ========== */
    .categories {
        display: flex;
        justify-content: space-between;
        padding: 50px 7%;
    }
    .category-card {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .category-card:hover {
        transform: translateY(-5px);
    }
    .category-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    .category-card h3 {
        padding: 15px 0;
        font-size: 1.2rem;
        font-weight: 600;
    }

    /* ========== Featured Products ========== */
    .featured-products {
        background-color: #F4F4F4;
        padding: 50px 7%;
    }
    .featured-products h2 {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 40px;
        color: #555;
    }
    .product-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        text-align: center;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .product-card:hover {
        transform: translateY(-5px);
    }
    .product-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    .product-card h3 {
        padding: 15px 0;
        font-size: 1rem;
        font-weight: 500;
    }
    .product-card button {
        background-color: #8B5E3C;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 0.85rem;
    }


</style>


<!-- Hero Section -->
<section class="hero-section">
    <h1>Push Your Limit</h1>
    <p>Explore exclusive products and deals curated just for you</p>
    <div>
        <a href="/shop">Shop Now</a>
    </div>
</section>

<!-- Categories -->
<section class="categories" id="categories">
    <div class="category-card">
        <a href="{{ route('user.shop.query', ['query' => '', 'category' => 'Laptop', 'sort_by' => 'title', 'sort_direction' => 'asc']) }}">
            <img src="https://via.placeholder.com/300x200" alt="Laptop">
            <h3>Laptops</h3>
        </a>
    </div>
    <div class="category-card">
        <a href="{{ route('user.shop.query', ['query' => '', 'category' => 'Camera', 'sort_by' => 'title', 'sort_direction' => 'asc']) }}">
            <img src="https://via.placeholder.com/300x200" alt="Camera">
            <h3>Cameras</h3>
        </a>
    </div>
    <div class="category-card">
        <a href="{{ route('user.shop.query', ['query' => '', 'category' => 'Powerbanks', 'sort_by' => 'title', 'sort_direction' => 'asc']) }}">
            <img src="https://via.placeholder.com/300x200" alt="Powerbanks">
            <h3>Powerbanks</h3>
        </a>
    </div>
</section>



<!-- Featured Products -->
<section class="featured-products" id="products">
    <h2>Our Best Sellers</h2>
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
                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-dark w-100 rounded-pill">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>

@endsection
@section('addition_css')
@endsection
@section('addition_script')
    <!-- <script src="{{asset('pages/js/plp.js')}}"></script> -->
@endsection