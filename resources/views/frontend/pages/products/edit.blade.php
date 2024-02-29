@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="text-center">{{ __('Edit Product') }}</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT method for update -->
                        <div class="form-group">
                            <label for="name" class="mb-2">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image" class="mb-2">Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="mb-2">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="rental_duration" class="mb-2">Rental Duration</label>
                            <input type="number" name="rental_duration" class="form-control" value="{{ $product->rental_duration }}">
                        </div>
                        <div class="form-group">
                            <label for="rental_fee" class="mb-2">Rental Fee</label>
                            <input type="number" name="rental_fee" class="form-control" value="{{ $product->rental_fee }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="mb-2">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
