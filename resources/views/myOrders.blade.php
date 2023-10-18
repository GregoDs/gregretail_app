<!-- resources/views/myOrders.blade.php -->

@extends('master')

@section('content')
    <div>
        <h2>My Orders</h2>

       
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
</table>
    </div>
@endsection
<!-- Link to your styles.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">