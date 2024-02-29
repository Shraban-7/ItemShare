@extends('frontend.layouts.master')

@section('content')
<section class="mt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">{{ __('Payment') }}</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="card_number" class="mb-2">Card Number</label>
                                <input type="text" name="card_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="expiry_date" class="mb-2">Expiry Date</label>
                                <input type="text" name="expiry_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv" class="mb-2">CVV</label>
                                <input type="text" name="cvv" class="form-control" required>
                            </div>
                            <!-- You can add more fields like cardholder's name, etc., as needed -->

                            <!-- Hidden field to pass the product id -->
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="is_payed" value="{{ 1 }}">

                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Make Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">{{ __('Pay with Cash') }}</h2>
                    </div>

                    <div class="card-body text-center"> <!-- Added text-center class here -->
                        <p>Please proceed to our physical store to make the payment with cash.</p>
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <!-- Hidden field to pass the product id -->
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="is_payed" value="{{ 0 }}">
                            <button type="submit" class="btn btn-success btn-lg mt-4">Proceed with Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
