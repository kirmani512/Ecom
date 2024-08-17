<!DOCTYPE html>
<html>

<head>

    @include('home.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;
        }

        td {
            border: 1px solid skyblue;
        }

        .cart_value {
            text-align: center;
            margin-bottom: 70px;
            padding: -18px;
        }

        .order_deg {
            padding-right: 100px;
            margin-top: 10px;
        }

        label {
            display: inline-block;
            width: 70px;
        }

        .div_gap {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

    </div>
    <!-- end hero area -->

    <div class="div_deg">
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>

            </tr>
            <?php
            $value = 0;
            ?>
            @foreach ($cart as $cart)
                <tr>
                    <td>{{ $cart->product->title }}</td>
                    <td>{{ $cart->product->price }}</td>
                    <td>
                        <img width="150" src="/products/{{ $cart->product->image }}">
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ url('remove_cart', $cart->product->id) }}">Remove</a>
                    </td>
                </tr>

                <?php
                $value = $value + $cart->product->price;
                ?>
            @endforeach

        </table>

    </div>
    <div class="cart_value">
        <h3>Your Order Amout : Rs {{ $value }}</h3>
    </div>
    <div class="order_deg" style="display: flex; justify-content:center; align-items:center">
        <form action="{{ url('confirm_order') }}" method="POST">
            @csrf
            <div class="div_gap">
                <label>Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div>

            <div class="div_gap">
                <label>Address</label>
                <textarea name="address">{{ Auth::user()->address }}</textarea>
            </div>

            <div class="div_gap">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>

            <div class="div_gap">
                <input class="btn btn-primary" type="submit" value="Place Order">
                <a class="btn btn-secondary" href="{{ url('stripe',$value) }}">Pay by Card</a>
            </div>

        </form>
    </div>






    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->


    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
