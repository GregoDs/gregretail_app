@extends('master')

@section('content')
<div class="container custom-product">
   <div class="row">
   <div class="col-sm-6">
<img src="{{$product['gallery']}}" alt="">
   </div>
   <div class="col-sm-6">
   <a href="{{ route('product.index') }}">Go back</a>
        <h2>{{$product['name']}}</h2>
        <h3>Price : {{$product["price"]}}</h3>
        <h4>Details: {{ $product["description"]}}</h4>
        <h4>Category: {{ $product["category"]}}</h4>
<br><br>
<form action="/addToCartSession" method="POST">
    @csrf
    <input type="hidden" name='product_id' value={{$product['id']}}>
<button class="btn btn-primary">Add to Cart</button>
<form action="/buy_now" method="POST">
@csrf
<button class="btn btn-primary">Buy Now</button>
<br><br>
   </div>
   </div>
</div>
<!-- Link to your styles.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
@endsection
