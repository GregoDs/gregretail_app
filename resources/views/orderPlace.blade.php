@extends('master')

@section('content')
    
<style>
  /* Apply a dark background color to the entire page */
  body {
    background-color: #000; /* You can use any dark color you prefer */
    color: #fff; /* Set text color to white or a contrasting color */
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif; /* Choose your preferred font-family */
  }

  /* Center the content within the page */
  .unit-copy-wrapper {
    text-align: center;
    max-width: 800px; /* Adjust the max-width to your preference */
    margin: 0 auto; /* Center horizontally */
    padding: 20px; /* Add padding to separate content from edges */
  }

  /* Define styles for the image */
  .hover-image {
    transition: transform 0.2s; /* Add a smooth transition effect */
    display: block; /* Make the image a block element for centering */
    margin: 0 auto 20px; /* Center the image horizontally and add space below it */
    max-width: 100%; /* Ensure the image fits within the width of its parent container */
  }

  /* Style for smaller headers */
  .headline {
    font-size: 24px; /* Adjust the font size for the headline */
  }

  .subhead {
    font-size: 18px; /* Adjust the font size for the subhead */
  }

  .cta-links a {
    font-size: 16px; /* Adjust the font size for the CTA links */
    margin-right: 10px; /* Add spacing between the links */
  }

  /* Apply a larger scaling effect on hover */
  .hover-image:hover {
    transform: scale(1.2); /* Increase the size when hovered */
  }
  /* Reduce the size of the header */
.navbar {
    padding: 10px 20px; /* Adjust these values as needed */
    min-height: 50px; /* Set the minimum height for the header */
}

/* Reduce the size of the logo */
.navbar-brand {
    font-size: 16px; /* Adjust the font size as needed */
}

/* Reduce font size for the links */
.nav-link {
    font-size: 14px; /* Adjust the font size as needed */
}

/* Spread out text and fill the page width */
.navbar-nav {
    width: 50%;
    justify-content: space-between;
}

.navbar-nav .nav-item {
    flex: 1;
    text-align: center;
}


/* Header alignment */
.header-elements {
    display: flex;
    align-items: center;
}

/* Separate Cart link from the rest */
.navbar-nav.navbar-right {
    margin-left: 60px;
}

/* Optional: Add spacing between header elements */
.navbar-nav li {
    margin-right: 10px;
}
/* CSS for the Apple logo */
.apple-logo {
    width: 30px; /* Set the maximum width as needed */
    height: auto; /* Maintain aspect ratio */
}
</style>
<div class="container custom-product">
    <div class="receipt">
        <h2>Your Order Receipt</h2>
        <a href="/index"> <!-- Replace "/dashboard" with the actual URL of your dashboard page -->
        <img src="https://images-platform.99static.com//7cbls2GHcK5utTq4f0-ei-DZD14=/160x94:1832x1767/fit-in/500x500/99designs-contests-attachments/142/142649/attachment_142649676" alt="Apple Logo" class="apple-logo">
</a>

        
        <table class="table table-dark table-bordered">
        <!-- Display orders details -->
        <ul>
            @foreach ($orders as $order)
                <li>
                    <strong>Product Price:</strong> ${{ $order->product->price }}
                </li>
            @endforeach
        </ul>
        @php
                $vatRate = 0.16; // 16% VAT Rate
                $vatAmount = $total * $vatRate;
                @endphp
        <!-- Display VAT amount -->
        <p><strong>VAT 16%:</strong> ${{ number_format($vatAmount, 2) }}</p>
        
        <!-- Display total amount -->
        <p><strong>Total Amount:</strong> ${{ number_format($total, 2) }}</p>
</table>
        <!-- Add an image with the hover effect -->
<img src='https://www.apple.com/v/iphone-15-pro/a/images/overview/welcome/hero_endframe__ov6ewwmbhiqq_large.jpg' alt="iPhone Image" class="hover-image">

    
    </div>
</div>

@endsection
