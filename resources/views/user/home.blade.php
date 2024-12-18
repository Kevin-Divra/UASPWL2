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
    position: relative;
    background: url('https://png.pngtree.com/thumb_back/fw800/background/20230521/pngtree-commercial-electronics-store-of-many-screens-image_2667345.jpg') no-repeat center/cover;
    text-align: center;
    padding: 100px 20px;
    color: #fff;
}

.hero-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Warna gelap dengan transparansi */
    z-index: 1; /* Agar berada di atas gambar, tapi di bawah teks */
}

.hero-section > * {
    position: relative;
    z-index: 2; /* Menjaga teks tetap di atas overlay */
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
        box-shadow: 0 4px 6px rgba(153, 35, 35, 0.1);
        transition: all 0.3s ease;
    }
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 6px rgba(255, 0, 0, 0.4);
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
    .card-footer {
        padding: 20px 40px;
    }

    .button {
    position: relative;
    width: 150px;
    height: 40px;
    cursor: pointer;
    display: flex;
    align-items: center;
    border: 1px solid #34974d;
    background-color: #3aa856;
    }

    .button, .button__icon, .button__text {
    transition: all 0.3s;
    }

    .button .button__text {
    transform: translateX(30px);
    color: #fff;
    font-weight: 600;
    }

    .button .button__icon {
    position: absolute;
    transform: translateX(109px);
    height: 100%;
    width: 39px;
    background-color: #34974d;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .button .svg {
    width: 30px;
    stroke: #fff;
    }

    .button:hover {
    background: #34974d;
    }

    .button:hover .button__text {
    color: transparent;
    }

    .button:hover .button__icon {
    width: 148px;
    transform: translateX(0);
    }

    .button:active .button__icon {
    background-color: #2e8644;
    }

    .button:active {
    border: 1px solid #2e8644;
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
        <img src="https://www.ptbsb.id/wp-content/uploads/2022/09/13.-Distributor-Laptop-Gaming-20-Jutaan-Terpercaya-scaled.jpg" alt="Laptop" style="width: 300px; height: 200px;">
            <h3>Laptops</h3>
        </a>
    </div>
    <div class="category-card">
        <a href="{{ route('user.shop.query', ['query' => '', 'category' => 'Camera', 'sort_by' => 'title', 'sort_direction' => 'asc']) }}">
            <img src="https://www.adobe.com/creativecloud/photography/discover/media_1b4507ec1fa10efefcbe23c58bea28edf67c4f402.png?width=750&format=png&optimize=medium" alt="Camera" style="width: 300px; height: 200px;">
            <h3>Cameras</h3>
        </a>
    </div>
    <div class="category-card">
        <a href="{{ route('user.shop.query', ['query' => '', 'category' => 'Powerbanks', 'sort_by' => 'title', 'sort_direction' => 'asc']) }}">
            <img src="https://rank.co.id/wp-content/uploads/2023/05/Power-Bank-Robot.jpg" alt="Powerbanks" style="width: 300px; height: 200px;">
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
                

                       
                        <div class="card-footer bg-transparent border-0 ">
                            <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                <button type="submit" class="button">
                                    <span class="button__text">Add Item</span>
                                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                </button>
                                
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