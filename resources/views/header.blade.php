<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;

$total=0;
if(Session::has('user'))
{
    $total= ProductController::cartItem();

}
?>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="/index">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAUdb8cPqBgqBJjGHbKvRe1K8b2NHb-HdXQVQ0SvjTBN3wERDfSVEabOi39pivkuJUlgQ&usqp=CAU" alt="Apple Logo" class="apple-logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Place all other header elements inside this div -->
        @if(Session::has('user'))
        <div class="header-elements">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{Session::get('user')['name']}} 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/logout">logOut</a>
                        <a class="dropdown-item" href="#">About Us</a>
                    </div>
                </li>
                @else 
                <li><a href="/login">Log in</a></li>
                @endif

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Place all other header elements inside this div -->
        <div class="header-elements">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Home
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Administrator</a>
                    <a class="dropdown-item" href="#">Our Location</a>
                        <a class="dropdown-item" href="#">About Us</a>
                    </div>
                </li>
            
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Orders
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/myOrders">Find an Order</a>
                </div>
                </li>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">Logout</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Support
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Help</a>
                        <a class="dropdown-item" href="#">Report</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Talk to us</a>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
    <li><a href="{{ route('cart.list') }}">Cart ({{ ProductController::cartItem() }})</a></li>
</ul>
        </div>
        <!-- End of header-elements div -->

        <!-- Move the search form to the far right -->
        <form action="/search" method="GET" class="form-inline my-2 my-lg-0 ml-auto">
            <div class="form-group">
            <input type="text" name="query" class="form-control search-box" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </div>
        </form>
    </div>
</nav>


