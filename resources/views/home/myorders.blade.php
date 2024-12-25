<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders List</title>
    @include('home.layout.css')

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.layout.header')
        <!-- end header section -->

        <div class="div_center">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Image</th>

                </tr>
                @foreach ($order as $order)
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product->title }}</td>
                            <td>{{ $item->product->price }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <img height="140" width="200" src="products/{{ $item->product->image }}">
                            </td>

                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>
    @include('home.layout.footer')

</body>

</html>
