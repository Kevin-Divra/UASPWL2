@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-5 text-center">Shop</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4" id="product-list">
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <!-- Link ke halaman detail produk -->
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{ asset('storage/images/'.$product->image) }}" class="card-img-top img-fluid" alt="{{ $product->title }}">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate">
                            <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none text-dark">
                                {{ $product->title }}
                            </a>
                        </h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                        <p class="card-text"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>

                            <!-- Tombol Add to Cart dengan icon -->
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm d-flex align-items-center">
                                    <i class="bi bi-cart-plus me-1"></i> Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {!! $products->links() !!}
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // Handle pagination with AJAX
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            $.ajax({
                url: '/shop/fetch-products?page=' + page,
                success: function (data) {
                    $('#product-list').html(data.products);
                    $('.pagination').html(data.pagination);
                }
            });
        });
    });
</script>
@endsection
