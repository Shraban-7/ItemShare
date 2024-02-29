@extends('frontend.layouts.master')

@section('content')
<section>
    <div class="container">
        <h2>Booking Details</h2>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage/products/'.$booking->product->image) }}" class="img-fluid rounded-start" alt="{{ $booking->product->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $booking->product->name }}</h5>
                        <p class="card-text">Category: {{ $booking->product->category->name }}</p>
                        <p class="card-text">Description: {!! $booking->product->description !!}</p>
                        <p class="card-text">Start Date: {{ $booking->start_date }}</p>
                        <p class="card-text">End Date: {{ $booking->end_date }}</p>
                        <!-- Add more details as needed -->
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back to Bookings</a>
                <!-- Add more actions/buttons as needed -->
            </div>
        </div>

        @php
            $currentDate = now(); // Get the current date and time
            $endDate = \Carbon\Carbon::parse($booking->end_date); // Parse the end date of the booking
        @endphp

        @if($endDate->lessThan($currentDate))
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Leave a Review</h5>
                    <form action="{{ route('review.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                        <input type="hidden" name="product_id" value="{{ $booking->product->id }}">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating:</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
