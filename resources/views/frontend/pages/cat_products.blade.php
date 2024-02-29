@extends('frontend.layouts.master')

@section('content')
    <section>
        <div class="container">
            <div class="jumbotron" style="margin-top: 30px!important;">
                <div class="container">
                    <div class="row">
                        <h2 class="text-center">All Products</h2>
                        <!-- Add the category filter dropdown -->


                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Renter Name</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $key => $product)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <img class="img img-responsive"
                                                style="padding: 15px;height: 120px; width: 100%;object-fit: cover"
                                                src="{{ asset('storage/products/'.$product->image) }}" alt="">
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->user->name }}</td>
                                        <td>
                                            <a class="box-btn btn btn-primary btn-block w-100 btn-sm"
                                                href="{{ route('products.details', $product->id) }}">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoryFilter').select2({
                placeholder: "Select a category",
                allowClear: true
            }).on('change', function() {
                var categoryId = $(this).val();
                window.location.href = '/products' + (categoryId ? '?category=' + categoryId : '');
            });
        });
    </script>
@endpush
