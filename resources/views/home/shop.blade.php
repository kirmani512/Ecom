<!DOCTYPE html>
<html>

<head>

    @include('home.layout.css')

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.layout.header')
        <!-- end header section -->

    </div>
    <!-- end hero area -->

    <!-- shop section -->

   @include('home.product')

    <!-- end shop section -->

@include('home.layout.footer')











    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
