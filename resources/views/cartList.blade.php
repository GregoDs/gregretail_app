@extends('master')

@section('content')
<div class="container custom-cart">
    <div class="row">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h1>Review your bag</h1> 
                <h8>Free delivery and free returns</h8> 
                <a href="{{ route('product.index') }}">Go back</a>
                <div class="product-grid">
                @foreach($products as $product)
                <div class="row product-item cart-list-divider">
                   
                <div class='col-md-4'>
                    <a href="<a href="{{ route('product.detail', ['id' => $product->id]) }}">
                        <img class="product-image" src="{{ $product->gallery }}" alt="{{ $product->name }}">
                            <h3>{{ $product->name }}</h3>
                            <h5>{{ $product->description }}</h5>
                            <p>Quantity:{{ $product->quantity }}</p>
                        </div>
                    </a>
                </div>
                

                
   <h9> <a href="/removeCart/{{$product->cart_id}}" class="remove-link">Remove from Cart</a></h9>


<div class='col-md-4'>
    <form action="/add_to_cart" method="POST">
        @csrf
        <input type="hidden" name='product_id' value="{{ $product->id }}">
        <button class="btn btn-primary custom-button">Add to Cart</button>
</div>

<div class='col-sn-3'>
    <a href="{{ route('buyNow') }}?product_id={{ $product->id }}" class="btn btn-primary custom-button">Buy Now</a>
</form>
</div>

                        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                @endforeach
            </div>
    </div>
</div>
<!-- Link to your styles.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
@endsection
