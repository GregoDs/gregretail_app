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
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJ0AAAB2CAMAAADle2GlAAAAYFBMVEX///8AAAD+/v7b29vj4+MiIiIZGRlpaWlQUFDs7Oz7+/vo6OjY2Nj09PTf39/AwMBISEiMjIy1tbVfX19kZGTIyMg5OTktLS2ioqLPz896enqoqKiampqBgYELCwtVVVXcwPpmAAAEBklEQVR4nO2bbXuqMAyGGUOUNxUYL8qU//8vNxkItElLWIPXzunzQUGb9r5aSdukOo6VlZWVlZVG7s/rQ91N9z55EwqOt25vI9y6wLffF+74yfNy8upO7adfSnTDBwKTQDeYqOjGL9fSWf3vCr06P5hQXh9D03DHjzdzyo8m0VynNsj20OcveWYyDUfGG5zL0ylNOC/G4d7eir6NiVccGp95zpFqBJyBJ2dy29W1CB2lWZnMh6lzwD0jMH443YkMl0YPu0pZJtPTgXOF+GFOZCvjHzt1qQPUNF2hug/kZnt3FqiLVYm62YWKdiS489Cq5gfhm3F6Holu7JKbhu79BXSXwSwoDdKNzkdcWJHo2qeZ7kn/psPWb9LCzoXpHlckumfXafyJmk7GdUfE+bKdQncOh/q1kx8yspArVolCdx3qftcWfcFTUQw2eh/5AjrvxyTSPK+vofODzqJYYrE9XTdPePvu+l6VpWp8N6Dz87qI4/iS7btC5yDI9v73x219OUZBEMXZ/v4quqoZZ/Iwey7nDk0wMY8+X0Mnrr4v10NZtrdY9FXBYXs6v5CLJlEE7QZDaEHASudHOrtpFwKjy0m3i7V2swGWe4+TLtPbzSQvYRnprsQ6gGmXkS7Qm00VA73PR5fSagB3Jmx0O+KGBVwTsNF90CqAJws2OtoDG4Fwq+m0ux7aPvm6mm7J8l2iO5BilxGyjOIaWdoTm8FwbHQ1yRwZWDN0rkx3Qgo64j65u8G2GCAdYE+luyAF4QoROIROyyNKoqP5YhIdXRKddmX3h+h8k3SzYDtMBy88pQxpf4GlYbj6Dn4qMGHhHi462jSLJTvWz7Nqut4bu8scgIukLVR0Uuoa1y9nMmwq4xrZlpbBDMHNNt/6jphpgCONbHT6vexc4Niy0RF/eDAeG11LnqwLOU7Gt2OkDq3jJOl2dOShdeRng4/uvqIa8bfHGKmgBnkAr8dIl5OPlEihFM4IGTm5Km1+OOmIwQrnXXIpnHR3olORHApv3Dgn1RHKFfDG3IGQOy6565jpzoSVigfYM2dTCEeZoBMt3LmexWMLhhe54iiDdjOXLIRAJqcL6KtPwnlUPIuXz495CQ0M9wEcwFP2nQm6RWmLBN5WbJGfFfCCU9MUQi4Dgdskt52PLEnTh+qqT280Rg/hbZJ5r7LO77lRPSnmX+PuiUkyPPe+0bmA861p0r0YasrTprlho7oh3UpZOuN01M2o7bt/lY54KnWpdp6+6QVyFxwIWyFDJ3rRqPnv1OobXiSOQ/hYto2upGWAo2xL1Doy0NGDbKiwDPB6Nebg1vyJQS16DEsh10lu2BlEuu5XY7+5p4Ii3ZtQeiIeU7LiEP4PVSsrKysrK6s/ri+nZzL+x+rUCwAAAABJRU5ErkJggg==" alt="Apple Logo" class="apple-logo">
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
              
    <a class="dropdown-item" href="{{ route('addProducts') }}">Administrator</a>


                    <a class="dropdown-item" href="{{route('profile')}}">User Details</a>
                        <a class="dropdown-item" href="#">About Us</a>
                    </div>
                </li>
            
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Orders
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="">Find an Order</a>
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
    <li><a href="{{ route('cartListSession') }}">Cart ({{ ProductController::cartItem() }})</a></li>
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


