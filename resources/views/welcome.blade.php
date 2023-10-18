
{{View::make('header')}}

  @yield('content')
    
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

<div class="container custom-login">
  <div class="unit-copy-wrapper">
    <h2 class="headline">iPhone 15 Pro</h2>
    <h3 class="subhead" role="presentation">Titanium. So strong. So light. So Pro.</h3>
    <div class="cta-links">
      <a class="icon icon-after icon-chevronright" href="/iphone-15-pro/" target="_self" rel="follow" data-analytics-region="learn more" data-analytics-title="Learn more about iPhone 15 Pro" aria-label="Learn more about iPhone 15 Pro">Learn more</a>
      <a class="icon icon-after icon-chevronright" href="/index" target="_self" rel="follow" data-analytics-region="buy" data-analytics-title="Buy iPhone 15 Pro" aria-label="Buy iPhone 15 Pro">Buy</a>
    </div>

    <!-- Add an image with the hover effect -->
    <img src='https://www.apple.com/v/iphone-15-pro/a/images/overview/welcome/hero_endframe__ov6ewwmbhiqq_large.jpg' alt="iPhone Image" class="hover-image">
  </div>
</div>
