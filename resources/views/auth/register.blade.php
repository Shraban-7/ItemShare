@extends('layouts.guest')

@section('css')
    <style>
        body {
            background-color: #2C3E50; /* Set your desired background color */
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center vh-100 py-1 py-md-4">
        <!-- Main content START -->
        <div class="col-md-6">
            <div class="card card-body p-5 p-sm-5 card_auth_shadow">
                <h1 class="light-mode-item navbar-brand-item text-capitalize text-center">
                    ItemShare
                </h1>
                <br>
                <!-- Title -->
                <h2 class="mb-3 text-gray text-center">Register</h2>
                <br>
                <!-- Form START -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Phone Number</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                  

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100 btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <!-- Form END -->
                <div class="d-flex justify-content-between mt-2">
                    <p class="p_light_gray">Already have an account? <a class="dark_blue_link" href="{{ route('login') }}" style="text-decoration: underline;">Sign In</a></p>
                </div>
            </div>
        </div>
    </div> <!-- Row END -->
</div>
@endsection
