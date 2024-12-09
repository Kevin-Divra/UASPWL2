@extends('layouts.app-public')
@section('title', 'Product Detail')
@section('content')

<style>
    .product-image img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto; /* Gambar di tengah */
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
        margin-top: 300px; /* Jarak besar dari elemen sebelumnya */
    }

    .container {
        padding-top: 50px;
    }

    .text-center {
        text-align: center;
    }
</style>

</style>



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
                                    <a href="{{asset('assets/images/product/single-product-01.webp')}}" class="poppu-img product-img-main-href">
                                        <img src="{{asset('assets/images/product/single-product-01.webp')}}" class="img-fluid product-img-main-src" alt="">
                                    </a>
                                </div>
                            </div> 
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{asset('assets/images/product/single-product-02.webp')}}" class="poppu-img">
                                        <img src="{{asset('assets/images/product/single-product-03.webp')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{asset('assets/images/product/single-product-03.webp')}}" class="poppu-img">
                                        <img src="{{asset('assets/images/product/single-product-03.webp')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{asset('assets/images/product/single-product-04.webp')}}" class="poppu-img">
                                        <img src="{{asset('assets/images/product/single-product-04.webp')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="product-details-thumbs-2 slider-thumbs-2">
                            <div class="sm-image"><img src="{{asset('assets/images/product/small/1-100x100.webp')}}" alt="product image thumb" class="product-img-main-src"></div>
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
             <div class="product-details-content">
             <h1 class="font-weight--reguler mb-10" id="product-Nama">iPhone 13</h1>
            <h3 class="price" id="product-price">$98</h3>

            <!-- Deskripsi Produk -->
            <div class="quickview-peragraph mt-10">
            <p id="product-description">Sleek and Stylish Fan-Favorite iPhone, Designed for Everyday Use</p>
             </div>

         <!-- Tombol Order -->
            <button type="button" class="btn-order">Order</button>
            </div>
    
        </div>
    </div>

</div>
@endsection
@section('addition_css')
@endsection
@section('addition_script')
    <script src="{{asset('pages/js/pdp.js')}}"></script>
@endsection