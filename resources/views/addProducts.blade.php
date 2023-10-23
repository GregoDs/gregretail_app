@extends('master')

@section('content')
<div class="container">
    <h2>Add Product</h2>
    <form method="POST" action="{{ route('addProducts') }}" enctype="multipart/form-data">
        @csrf <!-- CSRF protection -->

        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <!-- Replace the file input with a text input for gallery URL -->
        <div class="form-group">
            <label for="gallery_url">Image URL:</label>
            <input type="text" name="gallery_url" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection

<!-- Link to your styles.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">