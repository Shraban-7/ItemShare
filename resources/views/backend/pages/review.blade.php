@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="text-center">{{ __('Submit Review') }}</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment" class="mb-2">Comment</label>
                            <textarea name="comment" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rating" class="mb-2">Rating</label>
                            <input type="number" name="rating" class="form-control" required min="1" max="5">
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <!-- You can add more hidden fields if needed -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
