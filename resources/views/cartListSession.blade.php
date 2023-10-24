@extends('master')
@section('content')
<div class="container custom-cart">
    <div class="row">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h1>Review your bag</h1>
                <h8>Free delivery and free returns</h8>
                <a href="{{ route('product.index') }}">Go back</a>
                @foreach($products as $product)
                <form action="{{ route('clearCartSession', ['id' => $product['product']['id']]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Clear Cart</button>
    </form>
               @endforeach
    <h1>Shopping Cart</h1>
                <table class="table table-dark table-bordered">
                    <tr>
                        <th>Product Name</th>
                        <th></th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th></th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product['product']['name'] }}</td>
                            <td>  <form action="/addToCartSession" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['product']['id'] }}">
                            <button class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div></td>
                            <td>{{ $product['product']['description'] }}</td>
                            <td>Quantity: {{ $product['quantity'] }}</td>
                           <td>  
    <form action="{{ route('removeItemFromCart', ['id' => $product['product']['id']]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Remove Item</button>
    </form></td>
                            <td>${{ $product['product']['price'] }}</td>
                            <td>${{ $product['quantity'] * $product['product']['price'] }}</td>
                            @php
                                $totalPrice += $product['quantity'] * $product['product']['price'];
                            @endphp
                        </tr>
                    @endforeach
                </table>
                <h1>Cart Summary</h1>
                <table class="table table-dark table-bordered">
                <tr>
                    <th class="text-light"></th>
                    <th class="text-light">Amount</th>
                </tr>
                <tr>
                    <td class="text-light">Sub Total</td>
                    <td class="text-light">${{ $totalPrice }}</td>
                </tr>
                    </div>
</table>
                <form action="/buyNowSession" method="POST">
                    @csrf
                    <button class="btn btn-primary">Checkout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Link to your styles.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
</div>
@endsection
