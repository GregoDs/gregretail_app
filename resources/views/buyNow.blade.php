@extends('master')

@section('content')
<div class="container custom-order">
    <div class="row">
        <div class="col-sm-10">
            <h2>Your Premium Order</h2>
         

            <table class="table table-dark table-bordered">
                <tr>
                    <th class="text-light">Item</th>
                    <th class="text-light">Amount</th>
                </tr>
                <tr>
                    <td class="text-light">Price</td>
                    <td class="text-light">Ksh{{ number_format($total, 2) }}</td>
                </tr>
                <tr>
                    <td class="text-light">Duration</td>
                    <td class="text-light">1 week</td>
                </tr>

                @php
                $vatRate = 0.16; // 16% VAT Rate
                $vatAmount = $total * $vatRate;
                $totalPrice = $total + $vatAmount;
                @endphp
                <tr>
                    <td class="text-light">VAT 16%</td>
                    <td class="text-light">Ksh{{ number_format($vatAmount, 2) }}</td>
                </tr>
                <tr>
                    <td class="text-light">Total</td>
                    <td class="text-light">Ksh{{ number_format($totalPrice, 2) }}</td>
                </tr>
            </table>
        </div>

        <form method="POST" action="/orderPlace">
    @csrf
<div class="container custom-product">
    <div class="form-group">
    <textarea  name="address" class="form-control" placeholder="enter your address"></textarea>
<div class="form-group">
<div class="form-group">
    <label for="pwd">Payment Method</label><br> <br>
<input type="radio" value="cash" name="payment"><span>online payment</span><br> <br>
<input type="radio" value="cash"  name="payment"><span>EMI payment</span><br> <br>
<input type="radio" value="cash" name="payment"><span>Payment on Delivery</span><br> <br>

</div>         
    <button class="btn btn-primary custom-button">Order Now</button>
</form>
</div>

            <p>By purchasing you now own this product. If the price changes, we’ll notify you beforehand. You can check your renewal date or cancel anytime via your account. No partial refunds. Spotify Premium Family terms apply.</p>

            <p>You agree to only invite family members who live with you at the same address.</p>
        </div>
    </div>
</div>

    </div>
</div>

<!-- Link to your styles.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
@endsection
