<!DOCTYPE html>
<html>

<head>

    @include('home.layout.css')

    <style type="text/css">
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;

        }

        .detail-box {
            padding: 15px;
            background-color: rgb(135, 204, 231);
          text-align: center;

        }
    </style>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.layout.header')
        <!-- end header section -->

    </div>

    <!--Product Details start-->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Product Details
                </h2>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="box">
                        <div class="div_center">
                            <img width="400" src="/products/{{ $data->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>Title:{{ $data->title }}</h6>
                            <h6>Price:
                                <span> {{ $data->price }}</span>
                            </h6>
                        </div>
                        <div class="detail-box">
                            <h6>Category: {{ $data->category }}</h6>
                            <h6>Quantity:
                                <span> {{ $data->quantity }}</span>
                            </h6>
                        </div>
                        <div class="detail-box">
                            <h6>Description:
                                <p> {{ $data->description }}</p>
                            </h6>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Product Details ed-->












    @include('home.layout.footer')

    <!-- end info section -->


    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
