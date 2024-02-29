@extends('frontend.layouts.master')

@section('content')
    <section>
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">

                <div class="col-md-7 col-12">
                    <h2>{{ $product->name }}</h2>

                    <div>
                        {!! $product->description !!}
                    </div>
                </div>

                <div class="col-md-5 col-12">
                    <div class="card pb-3">
                        <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top" height="250px"
                            alt="...">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title fs-2 fw-bold">QR {{ $product->rental_fee }}</h5>
                            </div>

                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Category : {{ $product->category->name }}</li>
                            <li class="list-group-item">Rental Duration : {{ $product->rental_duration }} days</li>
                        </ul>
                        {{-- <form action="{{ route('bookings.store') }}"  method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                    </form> --}}
                        @auth

                            @if (Auth::user()->role == 'user')
                                <a href="{{ route('process.payment', $product->id) }}"
                                    class="btn btn-primary w-100 mt-3 me-2">Book Now</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
