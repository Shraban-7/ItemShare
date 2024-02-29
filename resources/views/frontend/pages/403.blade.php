@extends('frontend.layouts.master')
@section('css')
<style>
    /* Custom styles */
    .error-container {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
  </style>
@endsection
@section('content')
<div class="error-container">
    <div>
      <h1 class="display-1">403</h1>
      <h2 class="display-4">Forbidden</h2>
      <p class="lead">Sorry, you don't have permission to access this page.</p>
      <p><a href="{{ route('main') }}" class="btn btn-primary">Go to Homepage</a></p>
    </div>
  </div>
@endsection
