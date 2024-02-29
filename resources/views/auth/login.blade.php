@extends('layouts.guest')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="container" style="background: #2C3E50">
        <div class="row justify-content-center align-items-center vh-100 py-1 py-md-4">
            <!-- Main content START -->
            <div class="col-sm-10 col-md-6 col-lg-6 col-xl-5 col-xxl-5">
                <!-- Sign in START -->
                <div class="card card-body p-5 p-sm-5 card_auth_shadow">
                    <h1 class="light-mode-item navbar-brand-item text-capitalize text-center">
                        ItemShare
                    </h1>
                    <br>
                    <!-- Title -->
                    <h2 class="mb-3 text-gray text-center">Welcome back!
                    </h2>
                    <p class="text-center">
                        Please enter your email number and password below.</p>
                    <br>
                    <!-- Form START -->
                    <form id="sign_in_form" action="{{ route('login') }}" accept-charset="UTF-8" method="post"
                        novalidate="novalidate" data-gtm-form-interact-id="0">
                        @csrf
                        <!-- Email -->
                        <div class="d-flex justify-content-between">
                            <h6>Email:</h6>
                        </div>
                        <div class="input-group-lg">
                            <input type="text" name="email" id="email" class="form-control valid"
                                placeholder="user@example.com" @error('email') is-invalid @enderror
                                value="{{ old('email') }}" autofocus="autofocus" autocomplete="email"
                                data-gtm-form-interact-field-id="0" aria-invalid="false">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <!-- New password -->
                        <div class="d-flex mt-3 justify-content-between">
                            <h6>Password:</h6>
                        </div>
                        <div class="position-relative">
                            <!-- Password -->
                            <div class="input-group input-group-lg">
                                <input type="password" @error('password') is-invalid @enderror name="password" id="password" class="form-control valid"
                                    placeholder="password" autocomplete="new-password" data-gtm-form-interact-field-id="1"
                                    aria-invalid="false">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <!-- Remember me -->
                        <div class="mb-4 mt-3 d-flex justify-content-between">
                            <div></div>
                            <a href="{{ URL::to('/otp_send') }}" class="gray_link" style="text-decoration: underline;">
                                Forgot password?
                            </a>
                        </div>
                        <div>
                            <!-- Button -->
                            <div class="d-grid" id="submit_button" style="height: auto !important;">
                                <button type="submit" class="btn btn-primary" id="button_auth_submit">Sign in</button>
                            </div>
                        </div>
                    </form>

                    <!-- Form END -->
                    <div class="d-flex justify-content-between mt-2">
                        <p class="p_light_gray">Don't have an account?
                            <a class="dark_blue_link" href="{{ route('register') }}" style="text-decoration: underline;">
                                Register Here
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Sign in START -->
            </div>
        </div> <!-- Row END -->
    </div>
@endsection
