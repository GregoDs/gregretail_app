@extends('master')

@section('content')
<div class="container custom-product">

    <div class="interactive-background" id="interactive-background"  style="margin-top: 1px;">
        <div class="background-image" id="background-image"></div>
        <div class="overlay"></div>
    </div>

</div>

<!-- Link to your styles.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
<script>
    const images = [
        'https://www.apple.com/v/iphone-15-pro/a/images/overview/welcome/hero_endframe__ov6ewwmbhiqq_large.jpg',
        'https://www.apple.com/v/macbook-pro-14-and-16/e/images/overview/hero/hero_intro__cww8m2vra4uq_large.jpg',
    ];

    // Function to set a random background image
    function setRandomBackgroundImage() {
        const randomIndex = Math.floor(Math.random() * images.length);
        const backgroundImage = document.getElementById('background-image');
        backgroundImage.style.backgroundImage = `url('${images[randomIndex]}')`;
    }

    // Set a random background image when the page is loaded
    window.addEventListener('load', setRandomBackgroundImage);

    // Set a random background image when the user logs in or out (you need to customize this part)
    // Example: You can call setRandomBackgroundImage() after login/logout

</script>

</div>
<div class="trending-wrapper" style="margin-top: 1px;">
<h3>On Demand Products</h3>
    <div class="d-flex flex-row flex-wrap justify-content-center">
        @foreach($products as $item)
            <div class="product-card m-3 p-3 border">
                <a href="detail/{{$item['id']}}">
                    <div class="text-center">
                        <img src="{{ $item['gallery'] }}" alt="{{ $item['name'] }}" class="img-fluid">
                        <h3>{{$item['name']}}</h3>
                        <p>{{$item['description']}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<!-- Link to your styles.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
@endsection
<!-- Add this script at the bottom of your template -->
<script>
    const interactiveBackground = document.getElementById('interactive-background');
    const backgroundImage = document.getElementById('background-image');

    interactiveBackground.addEventListener('mousemove', (e) => {
        const x = (e.clientX / window.innerWidth) * 100;
        const y = (e.clientY / window.innerHeight) * 100;
        backgroundImage.style.transform = `translate(-${x}%, -${y}%)`;
    });

    interactiveBackground.addEventListener('mouseleave', () => {
        backgroundImage.style.transform = 'translate(0, 0)';
    });
</script>
