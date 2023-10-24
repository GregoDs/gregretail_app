@extends('master')
@section('content')
<form method="POST" action="/placeOrderFromSession">
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
