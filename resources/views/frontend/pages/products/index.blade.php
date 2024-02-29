@extends('frontend.layouts.master')

@section('content')
<div class="container" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Products List') }}</div>

                <div class="card-body">
                    <div class="table-responsive"> <!-- Add this for responsiveness -->
                        <table class="table table-bordered"> <!-- Add table-bordered for borders -->
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Rent Price</th>
                                    <th>Rental Duration</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>${{ $product->rental_fee }}</td>
                                        <td>{{ $product->rental_duration }} Days</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
