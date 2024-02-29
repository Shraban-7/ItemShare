@foreach ($products as $product)
    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}" style="max-width: 300px; max-height: 300px;">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Category: {{ $product->category->name }}</p>
                    <p class="card-text">Rental Fee: {{ $product->rental_fee }}</p>
                    <a href="{{ route('products.details', $product->id) }}" class="btn btn-primary btn-sm">View</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
