@extends('frontend.layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css"
        media="screen">
    <style>
        /* Set up the overlay container */


        /* Create the background overlay */


        /* Style the cardboard effect */
        .cardboard {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .owl-carousel .owl-item {
            display: block;
            /* Ensure carousel items are displayed */
        }

        .owl-carousel .owl-item {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .owl-carousel .owl-item.active {
            opacity: 1;
        }

        CSS.g-6,
        .gx-6 {
            --bs-gutter-x: 4.5rem;
        }

        .g-6,
        .gy-6 {
            --bs-gutter-y: 4.5rem;
        }

        @media (min-width: 576px) {

            .g-sm-6,
            .gx-sm-6 {
                --bs-gutter-x: 4.5rem;
            }

            .g-sm-6,
            .gy-sm-6 {
                --bs-gutter-y: 4.5rem;
            }
        }

        @media (min-width: 768px) {

            .g-md-6,
            .gx-md-6 {
                --bs-gutter-x: 4.5rem;
            }

            .g-md-6,
            .gy-md-6 {
                --bs-gutter-y: 4.5rem;
            }
        }

        @media (min-width: 992px) {

            .g-lg-6,
            .gx-lg-6 {
                --bs-gutter-x: 4.5rem;
            }

            .g-lg-6,
            .gy-lg-6 {
                --bs-gutter-y: 4.5rem;
            }
        }

        @media (min-width: 1200px) {

            .g-xl-6,
            .gx-xl-6 {
                --bs-gutter-x: 4.5rem;
            }

            .g-xl-6,
            .gy-xl-6 {
                --bs-gutter-y: 4.5rem;
            }
        }

        @media (min-width: 1400px) {

            .g-xxl-6,
            .gx-xxl-6 {
                --bs-gutter-x: 4.5rem;
            }

            .g-xxl-6,
            .gy-xxl-6 {
                --bs-gutter-y: 4.5rem;
            }
        }

        .mb-6 {
            margin-bottom: 4.5rem !important;
        }

        .py-6 {
            padding-top: 4.5rem !important;
            padding-bottom: 4.5rem !important;
        }

        .w-100px {
            width: 100px !important;
        }

        .h-100px {
            height: 100px !important;
        }

        @media (min-width: 576px) {
            .mb-sm-6 {
                margin-bottom: 4.5rem !important;
            }

            .py-sm-6 {
                padding-top: 4.5rem !important;
                padding-bottom: 4.5rem !important;
            }
        }

        @media (min-width: 768px) {
            .mb-md-6 {
                margin-bottom: 4.5rem !important;
            }

            .py-md-6 {
                padding-top: 4.5rem !important;
                padding-bottom: 4.5rem !important;
            }
        }

        @media (min-width: 992px) {
            .mb-lg-6 {
                margin-bottom: 4.5rem !important;
            }

            .py-lg-6 {
                padding-top: 4.5rem !important;
                padding-bottom: 4.5rem !important;
            }
        }

        @media (min-width: 1200px) {
            .mb-xl-6 {
                margin-bottom: 4.5rem !important;
            }

            .py-xl-6 {
                padding-top: 4.5rem !important;
                padding-bottom: 4.5rem !important;
            }
        }

        @media (min-width: 1400px) {
            .mb-xxl-6 {
                margin-bottom: 4.5rem !important;
            }

            .py-xxl-6 {
                padding-top: 4.5rem !important;
                padding-bottom: 4.5rem !important;
            }
        }

        .carousel-item {
            height: 500px;
            /* Adjust the height as needed */
        }

        /* Ensure images fill the available space */
        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="p-5 mt-4">
                    <!-- Heading with typing animation -->
                    <h1 class="display-4">ItemShare: Discover and Rent Unused Items</h1>
                    <p class="lead">Explore our extensive selection of top-quality products and services designed to
                        enhance your experience, whether it's for a weekend getaway, a special occasion, or everyday needs.
                    </p>
                    <a href="#" class="btn btn-outline-dark">Start Browsing</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('frontend/images/slide4.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('frontend/images/slider2.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('frontend/images/slider3.png') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>







    <section>
        <div class="container mt-5 mb-5">
            <h2 class="text-center mb-4">Our Latest Items</h2>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 col-12 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top"
                                height="200px" width="100%" alt="{{ $product->name }} Image">
                            <div class="card-body" style="height: 200px;">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text" style="max-height: 100px; overflow: hidden;">{!! Str::limit($product->description, 100, '...') !!}
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('products.details', $product->id) }}"
                                    class="btn btn-primary w-100">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

  <!-- Achievement 1 - HCF Bootstrap 5 Component -->
  <section class="bg-light py-5 py-xl-6">
    <div class="container mb-5 mb-md-6">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                <h2 class="mb-4 display-5">Achievements</h2>
                <p class="text-secondary mb-4 mb-md-5">We take pride in our accomplishments, reflecting our commitment
                    to excellence in serving our customers.</p>
                <hr class="w-50 mx-auto mb-0 text-secondary">
            </div>
        </div>
    </div>
    <div class="container overflow-hidden">
        <div class="row gy-5 gy-md-6 gy-lg-0">
            <div class="col-6 col-lg-3">
                <div class="text-center">
                    <div
                        class="d-flex align-items-center justify-content-center bg-primary rounded-circle w-100px h-100px mb-3 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-people text-white" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                        </svg>
                    </div>
                    <h5 class="display-6 fw-bold m-1">120K</h5>
                    <p class="text-secondary m-0">Satisfied Clients</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="text-center">
                    <div
                        class="d-flex align-items-center justify-content-center bg-primary rounded-circle w-100px h-100px mb-3 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-activity text-white" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                        </svg>
                    </div>
                    <h5 class="display-6 fw-bold m-1">1890+</h5>
                    <p class="text-secondary m-0">Maintenance Issues Resolved</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="text-center">
                    <div
                        class="d-flex align-items-center justify-content-center bg-primary rounded-circle w-100px h-100px mb-3 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-briefcase text-white" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </div>
                    <h5 class="display-6 fw-bold m-1">250K</h5>
                    <p class="text-secondary m-0">Items Successfully Rented</p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="text-center">
                    <div
                        class="d-flex align-items-center justify-content-center bg-primary rounded-circle w-100px h-100px mb-3 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-award text-white" viewBox="0 0 16 16">
                            <path
                                d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
                            <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                        </svg>
                    </div>
                    <h5 class="display-6 fw-bold m-1">786+</h5>
                    <p class="text-secondary m-0">Recognition from Awwwards</p>
                </div>
            </div>
        </div>
    </div>
</section>



    {{--
    <section>
        <div class="container mt-5 mb-5">
            <div class="row">
                @foreach ($reviews as $review)
                    <div class="col-md-3 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">User: {{ $review->user->name }}</h5>
                                <p class="card-text">
                                    Rating:
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <i class="fas fa-star text-warning"></i>
                                    @endfor
                                    @for ($i = $review->rating; $i < 5; $i++)
                                        <i class="far fa-star text-warning"></i>
                                    @endfor
                                </p>
                                <p class="card-text">{{ $review->comment }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    <!-- Testimonial 3 - Bootstrap Brain Component -->
    <section class="bg-light py-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Happy Customers</h2>
                    <p class="display-7 mb-4 mb-md-5 text-center">We deliver what we promise. See what clients are
                        expressing about us.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div id="customerReviewsSlider" class="container overflow-hidden">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $totalReviews = count($reviews);
                        $numSlides = ceil($totalReviews / 4); // Update to display 4 cards per slide
                    @endphp

                    @for ($i = 0; $i < $numSlides; $i++)
                        <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                            <div class="row gy-4 gy-md-0 gx-xxl-5">
                                @php
                                    $start = $i * 4; // Update to display 4 cards per slide
                                    $end = min($start + 4, $totalReviews); // Update to display 4 cards per slide
                                @endphp

                                @for ($j = $start; $j < $end; $j++)
                                    <div class="col-12 col-md-3"> <!-- Change col-md-4 to col-md-3 for 4 cards per row -->
                                        <div class="card border-0 border-bottom border-primary shadow-sm bsb-rating-card">
                                            <div class="card-body p-4 p-xxl-5">
                                                <figure>
                                                    <!-- <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy" src="./assets/img/testimonial-img-1.jpg" alt="Luna John"> -->
                                                    <figcaption>
                                                        @for ($k = 0; $k < 5; $k++)
                                                            @if ($k < $reviews[$j]->rating)
                                                                <span class="bsb-ratings text-warning">&#9733;</span>
                                                            @else
                                                                <span class="bsb-ratings text-warning">&#9734;</span>
                                                            @endif
                                                        @endfor
                                                        <blockquote class="bsb-blockquote-icon mb-4">
                                                            {{ $reviews[$j]->comment }}
                                                        </blockquote>
                                                        <h4 class="mb-2">{{ $reviews[$j]->user->name }}</h4>
                                                        <!-- <h5 class="fs-6 text-secondary mb-0">UX Designer</h5> -->
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>


    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        // JavaScript to make anchor tags clickable within the carousel

        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });

        $(document).ready(function() {
            $('#customerReviewsSlider').slick({
                slidesToShow: 3, // Adjust as needed
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000 // Adjust autoplay speed as needed
            });
        });

        var typed = new Typed('#typed-heading', {
            strings: ['Welcome to our Rental & Booking Platform'],
            typeSpeed: 50,
            backSpeed: 20,
            loop: false
        });
    </script>
@endpush
