@extends('frontend.layouts.master')

@section('content')
    <div class="container-fluid" style="min-height: 80vh;"> <!-- Added min-height style -->
        <div class="row justify-content-center align-items-center"> <!-- Centering content vertically -->
            <div class="col-md-10">
                <div class="card-deck"> <!-- Changed to card-deck for better arrangement -->
                    <div class="card shadow-lg border-primary"> <!-- Added border and modified shadow -->
                        <div class="card-body">
                            <h5 class="card-title">Welcome, {{ Auth::user()->name }}!</h5>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (Auth::user()->role == 'user')
                                <div class="card-text mt-3">
                                    <div class="card border-info mb-3"> <!-- New card for number of bookings -->
                                        <div class="card-body text-info"> <!-- Styling for number of bookings -->
                                            <h5 class="card-title">Your Bookings</h5>
                                            <p class="card-text" style="font-size: 24px;">{{ $bookingCount }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('bookings.index') }}" class="btn btn-primary">Go to Your Bookings</a>
                                </div>
                            @elseif(Auth::user()->role == 'renter')
                                <div class="card-text mt-3">
                                    <div class="card border-info mb-3"> <!-- New card for number of bookings -->
                                        <div class="card-body text-info"> <!-- Styling for number of bookings -->
                                            <h5 class="card-title">Your Product Count</h5>
                                            <p class="card-text" style="font-size: 24px;"> {{ $productCount }}</p>
                                        </div>
                                    </div>
                                    <div class="card border-warning mb-3"> <!-- New card for number of bookings -->
                                        <div class="card-body text-info"> <!-- Styling for number of bookings -->
                                            <h5 class="card-title">Number of products rented:</h5>
                                            <p class="card-text" style="font-size: 24px;"> {{ $rentedProductCount }}</p>
                                        </div>
                                    </div>
                                    @if (count($orders) > 0)
                                    <div class="card border-info mb-3"> <!-- New card for number of bookings -->
                                        <div class="card-body text-info"> <!-- Styling for number of bookings -->
                                            <h5 class="card-title">Your Orders</h5>
                                            <p class="card-text" style="font-size: 24px;"> {{ count($orders) }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="card border-info mb-3"> <!-- New card for number of bookings -->
                                        <div class="card-body text-info"> <!-- Styling for number of bookings -->
                                            <h5 class="card-title">No Orders</h5>

                                        </div>
                                    </div>
                                @endif

                                    <a href="{{ route('products.index') }}" class="btn btn-primary">Go to Product List</a>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
