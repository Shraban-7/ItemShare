@extends('frontend.layouts.master')

@section('content')
    <section>
        <div class="container">
            <div class="jumbotron" style="margin-top: 30px!important;">
                <div class="container">
                    <div class="row">
                        <h2 class="text-center">All items</h2>
                        <!-- Add the category filter dropdown -->


                        <div class="row" id="productList">
                            @forelse ($products as $key => $product)
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
                            @empty
                                <div class="col-md-12">
                                    <div class="alert alert-info" role="alert">
                                        No data available
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


