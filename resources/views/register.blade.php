@extends('master')

@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="text-center">
                <h2>Registration</h2>
            </div>
            <form action="/register" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                </div>

                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Address" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
