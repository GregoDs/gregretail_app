@extends('master')
@section('content')
<head>
    <style>
        /* Adding my custom CSS styles for the receipt here */
        /*and also Centering my content */
        body {
            text-align: center;
        }
        .receipt-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
       
    </style>
</head>
<body>
@php
                $vatRate = 0.16; // 16% VAT Rate
                $vatAmount = $total * $vatRate;
                $totalPrice = $total + $vatAmount;
                @endphp
    <div class="receipt-container">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJ0AAAB2CAMAAADle2GlAAAAYFBMVEX///8AAAD+/v7b29vj4+MiIiIZGRlpaWlQUFDs7Oz7+/vo6OjY2Nj09PTf39/AwMBISEiMjIy1tbVfX19kZGTIyMg5OTktLS2ioqLPz896enqoqKiampqBgYELCwtVVVXcwPpmAAAEBklEQVR4nO2bbXuqMAyGGUOUNxUYL8qU//8vNxkItElLWIPXzunzQUGb9r5aSdukOo6VlZWVlZVG7s/rQ91N9z55EwqOt25vI9y6wLffF+74yfNy8upO7adfSnTDBwKTQDeYqOjGL9fSWf3vCr06P5hQXh9D03DHjzdzyo8m0VynNsj20OcveWYyDUfGG5zL0ylNOC/G4d7eir6NiVccGp95zpFqBJyBJ2dy29W1CB2lWZnMh6lzwD0jMH443YkMl0YPu0pZJtPTgXOF+GFOZCvjHzt1qQPUNF2hug/kZnt3FqiLVYm62YWKdiS489Cq5gfhm3F6Holu7JKbhu79BXSXwSwoDdKNzkdcWJHo2qeZ7kn/psPWb9LCzoXpHlckumfXafyJmk7GdUfE+bKdQncOh/q1kx8yspArVolCdx3qftcWfcFTUQw2eh/5AjrvxyTSPK+vofODzqJYYrE9XTdPePvu+l6VpWp8N6Dz87qI4/iS7btC5yDI9v73x219OUZBEMXZ/v4quqoZZ/Iwey7nDk0wMY8+X0Mnrr4v10NZtrdY9FXBYXs6v5CLJlEE7QZDaEHASudHOrtpFwKjy0m3i7V2swGWe4+TLtPbzSQvYRnprsQ6gGmXkS7Qm00VA73PR5fSagB3Jmx0O+KGBVwTsNF90CqAJws2OtoDG4Fwq+m0ux7aPvm6mm7J8l2iO5BilxGyjOIaWdoTm8FwbHQ1yRwZWDN0rkx3Qgo64j65u8G2GCAdYE+luyAF4QoROIROyyNKoqP5YhIdXRKddmX3h+h8k3SzYDtMBy88pQxpf4GlYbj6Dn4qMGHhHi462jSLJTvWz7Nqut4bu8scgIukLVR0Uuoa1y9nMmwq4xrZlpbBDMHNNt/6jphpgCONbHT6vexc4Niy0RF/eDAeG11LnqwLOU7Gt2OkDq3jJOl2dOShdeRng4/uvqIa8bfHGKmgBnkAr8dIl5OPlEihFM4IGTm5Km1+OOmIwQrnXXIpnHR3olORHApv3Dgn1RHKFfDG3IGQOy6565jpzoSVigfYM2dTCEeZoBMt3LmexWMLhhe54iiDdjOXLIRAJqcL6KtPwnlUPIuXz495CQ0M9wEcwFP2nQm6RWmLBN5WbJGfFfCCU9MUQi4Dgdskt52PLEnTh+qqT280Rg/hbZJ5r7LO77lRPSnmX+PuiUkyPPe+0bmA861p0r0YasrTprlho7oh3UpZOuN01M2o7bt/lY54KnWpdp6+6QVyFxwIWyFDJ3rRqPnv1OobXiSOQ/hYto2upGWAo2xL1Doy0NGDbKiwDPB6Nebg1vyJQS16DEsh10lu2BlEuu5XY7+5p4Ii3ZtQeiIeU7LiEP4PVSsrKysrK6s/ri+nZzL+x+rUCwAAAABJRU5ErkJggg==" alt="Your Logo" width="150" height="auto">
        <h1>Receipt</h1>
        <p>Date: {{ $Date }}</p>
        <p>Order ID: {{ $order_id }}</p>
        <p>VAT: {{$vatAmount}}</p>
        <p>Total Price: ${{ $totalPrice }}</p>
        <p>Username: {{ $userName }}</p>
    </div>
</body>
@endsection
 <!-- Link to your styles.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">