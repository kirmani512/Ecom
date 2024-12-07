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
                <th>Quantity</th>
                <th>Total</th>
                <th>Image</th>
                <th>Action</th>

            </tr>
            <?php
            $value = 0;
            ?>
            @foreach ($cart as $cart_item)

                <tr>
                    <td>{{ $cart_item->product->title }}</td>
                    <td>{{ $cart_item->product->price }}</td>
                    <td>
                        <input type="number" class="quantity" data-id="{{$cart_item->id}}" value="{{$cart_item->qty}}">
                    </td>
                    <td class="item-total">{{ $cart_item->product->price * $cart_item->qty }}</td>

                    <td>
                        <img width="150" src="/products/{{ $cart_item->product->image }}">
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ url('remove_cart', $cart_item->product->id) }}">Remove</a>
                    </td>
                </tr>

                <?php
                $value = $value + ($cart_item->product->price*$cart_item->qty);
                ?>
            @endforeach

        </table>

    </div>
    <div class="cart_value">
        <h3>Your Order Amout : Rs <span id="total-value"> {{ $value }}</span></h3>
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
    <script>
        $(document).ready(function () {
            // Attach event listener for quantity change
            $('.quantity').on('change', function () {
                let $input = $(this); // Capture the input element
                let cartItemId = $input.data('id'); // Get cart item ID
                let quantity = $input.val(); // Get the new quantity value

                // Validate the input
                if (quantity < 1) {
                    alert('Quantity must be at least 1');
                    $input.val(1); // Reset to 1 if invalid
                    return;
                }

                // Send AJAX request to update the cart quantity
                $.ajax({
                    url: '/update_cart/' + cartItemId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        qty: quantity
                    },
                    success: function (response) {
                        // Update the item total
                        $input.closest('tr').find('.item-total').text(response.item_total);

                        // Update the overall cart total
                        $('#total-value').text(response.new_total);
                    },
                    error: function () {
                        alert('Failed to update the cart. Please try again.');
                    }
                });
            });
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
