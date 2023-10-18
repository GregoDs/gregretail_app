
@extends('master')
@section('content')
<div class="container custom-login">
    <div class="row">
    <div class="col-md-4 offset-md-4">
            <div class="text-center">
                <h2>Sign in with your Personal ID</h2>
            </div>
            <form action="/login" method="POST">
                <div class="form-group">
                    @csrf
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    <div>
                    <a class="icon icon-after icon-chevronright" href="/register" target="_self" rel="follow" data-analytics-region="register" data-analytics-title="Not Registered yet" aria-label="Not registered yet">Not Registered yet?</a>

                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign In</button></form>
            </form>
        </div>
    </div>
</div>


<!-- Link to your styles.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/styles.css') }}">


@endsection
