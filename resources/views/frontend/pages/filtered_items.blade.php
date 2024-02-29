@extends('frontend.layouts.master')

@section('content')
    <section>
        <div class="container" style="min-height: 80vh;">
            <div class="jumbotron" style="margin-top: 30px!important;">
                <div class="container">
                    <div class="row">
                        <h2 class="text-center mb-5 text-capitalize">
                            filtered item
                        </h2>
                        <!-- Add the category filter dropdown -->
                        <div class="row">
                            @forelse ($items as $key => $product)
                            <div class="card mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}" style="max-width: 300px; max-height: 300px;">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">Category: {{ $product->category->name }}</p>
                                            <p class="card-text">Rental Fee: {{ $product->rental_fee }} QR</p>
                                            <a href="{{ route('products.details', $product->id) }}" class="btn btn-primary">View</a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .flex-row {
            display: flex;
            flex-direction: row;
        }

        .card-img-left {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
    </style>
@endpush
