@extends('frontend.layouts.master')

@section('css')
    <style>
        .btn-semi-rounded {
            border-radius: 15px !important;

            background: #2C3E50 !important;
            /* Adjust the value to change the roundness */
        }
    </style>
@endsection

@section('content')
    <section class="my-6">
        <div class="container mt-12 mb-8">
            <div class="row">

                <div class="col-md-7">
                    <h2 class="display-3">How to rent on ItemShare</h2>
                    <p class="display-5">Access items without owning them by renting them from people in your neighbourhood
                        in a few easy steps.</p>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('frontend/images/how1.svg') }}" class="img-fluid" alt="Placeholder Image">
                </div>
            </div>
        </div>

        <div class="container mt-8 mb-8 custom-background1">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('frontend/images/how2.svg') }}" class="img-fluid mx-auto d-block"
                        alt="Placeholder Image">
                </div>
                <div class="col-md-7">
                    <h1 class="display-4">Before the rental</h1>
                    <h2 class="h4">Find an item nearby</h2>
                    <p class="lead">Search for the items you’re looking for and filter by location.</p>
                    <h2 class="h4">Request and book</h2>
                    <p class="lead">Send a request to the lender for the dates you’d like the items. When they accept your
                        request you can book the items by paying.</p>
                    <h2 class="h4">Verify</h2>
                    <p class="lead">If you haven't before - you’ll be asked to verify your identity and then the rental
                        will be confirmed.</p>
                    <!-- Add Bootstrap classes and custom styles to the button -->
                    <button class="btn btn-primary btn-semi-rounded py-2 px-3 btn-lg btn-block mt-4">
                        Browse items
                    </button>
                </div>
            </div>
        </div>


        <div class="container mt-8 custom-background2">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-4">During the rental</h1>
                    <h2 class="h4">Enjoy your rental and return on time</h2>
                    <p class="lead">Make the most of your time with the item and then return it safely to the owner at the
                        end of the rental.</p>
                    <h2 class="h4">Need more time?</h2>
                    <p class="lead">Be sure to check in with the lender and book extra days if the item is available and
                        you want to keep it for longer.</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('frontend/images/how3.svg') }}" class="img-fluid" alt="Placeholder Image">
                </div>

            </div>
        </div>
        <div class="container mt-8 mb-8">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/images/how4.svg') }}" class="img-fluid mx-auto d-block"
                        alt="Placeholder Image">
                </div>
                <div class="col-md-6">

                    <h2 class="display-5">
                        Playing your part</h2>
                    <p class="lead">Renting on Fat Llama isn’t just convenient and cost effective. By buying less and
                        renting more, you’re also contributing to a circular economy, making better use of resources and
                        helping to protect this wonderful planet we live on.</p>

                    <button class="btn btn-primary btn-semi-rounded py-2 px-3 btn-lg btn-block mt-4">
                        Browse items
                    </button>
                </div>


            </div>
        </div>
        <div class="container mt-8 mb-12">
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-md-8">
                    <h2 class="display-5">
                        Want to make some money too?
                    </h2>
                    <p class="lead">
                        Rent your belongings to people in your area to make some extra cash.
                    </p>
                    <button class="btn btn-primary btn-semi-rounded py-2 px-3 btn-lg mt-4">
                        Learn more
                    </button>
                </div>
            </div>
        </div>

    </section>
@endsection
