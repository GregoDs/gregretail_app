<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gregory's Project</title>
    
    <!--style.css link-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
    
</head>
<body>
    
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}
</body>
<style>
        
        .custom-login{
            height: 500px;
            padding-top:70px;
        }
        
        .custom-product {
    height: 1000px;
    padding-bottom: 0.05px; /* Adjust this value as needed */
    padding-top: 10px;
}
.custom-cart {
    padding-bottom: 20px;
    padding-top: 20px;
    overflow-y: auto; /* Add this to enable scrolling within the container */
}

.custom-order {
    min-height: 600px;
    padding-bottom: 100px; /* Adjust this value as needed */
    padding-top: 100px;
}

        /* Style the button */
        button {
            background-color: #3498db; /* Set the background color */
            color: white; /* Set the text color */
            border: none; /* Remove the border */
            padding: 10px 20px; /* Add padding to make the button larger */
            border-radius: 5px; /* Round the corners */
            cursor: pointer; /* Add a pointer cursor on hover */
        }

        /* Style the button on hover */
        button:hover {
            background-color: #2980b9; /* Change the background color on hover */
        }

    /* Header Styling */
    .navbar {
            background-color: #f8f9fa; /* Light gray background color */
            border-bottom: 1px solid #e1e4e8; /* Light gray border */
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; /* Apple-like font stack */
        }

        .navbar-brand {
            font-size: 24px; /* Larger font size */
            font-weight: bold; /* Bold font weight */
            color: #333; /* Dark text color */
        }

        .navbar-light .navbar-nav .nav-link {
            color: #333 !important; /* Dark text color for navbar links */
        }
        .custom-product{

          height: 500px;
        }
        .search-box{
            width: 500px;
        }
    </style>
</html>