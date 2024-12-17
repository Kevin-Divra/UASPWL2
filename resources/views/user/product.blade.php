@extends('layouts.app-public')

@section('title', 'Product Detail')

@section('content')

<style>
    .product-image img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto; /* Center image */
    }

    .product-title {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 24px;
        color: #555;
        margin-bottom: 15px;
    }

    .product-description {
        font-size: 16px;
        color: #777;
        margin-bottom: 20px;
    }

    .btn-order {
        display: block;
        width: 500px;
        padding: 15px;
        text-align: center;
        background-color: #000;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        margin-top: 300px; /* Large margin from previous elements */
    }

    .container {
        padding-top: 50px;
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="site-wrapper-reveal">
    <div class="single-product-wrap section-space--pt_90 border-bottom pb-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-details-left">
                        <div class="product-details-images-2 slider-lg-image-2">
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{ asset('/storage/images/' . $product->image) }}" class="popup-img product-img-main-href">
                                        <img src="{{ asset('/storage/images/' . $product->image) }}" class="img-fluid product-img-main-src" alt="{{ $product->title }}">
                                    </a>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-details-content">
                        <h2 class="font-weight--reguler mb-10" id="product-Nama">{{ ucwords($product->title) }}</h2>
                        <h3 class="price" id="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

                        <!-- Product Category -->
                        <h5 class="category">
                            <strong>Category: </strong>{{ ucwords($product->product_category_name) }}
                        </h5>

                        <!-- Deskripsi Produk -->
                        <div class="quickview-paragraph mt-10">
                            <h6 id="product-description">{{ ucwords(strip_tags($product->description)) }}</h6>
                        </div>

                        <!-- Stock Information -->
                        <p class="stock">
                            <strong>Stock: </strong>{{ $product->stock }} available
                        </p>

                        <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_product" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-dark w-100 rounded-pill">Add to Cart</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
