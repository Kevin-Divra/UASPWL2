@foreach ($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card">
            <a href="{{ route('product.show', $product->id) }}">
                <img src="{{ asset('storage/images/'.$product->image) }}" class="card-img-top" alt="{{ $product->title }}">
            </a>
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
                </h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 50) }}</p>
                <p class="card-text"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-sm">View Details</a>
                <a href="#" class="btn btn-secondary btn-sm">Add to Cart</a>
            </div>
        </div>
    </div>
@endforeach
