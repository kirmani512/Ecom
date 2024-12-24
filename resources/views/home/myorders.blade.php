<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders List</title>
    @include('home.css')
    <style type="text/css">
        .div_center {
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
            border: 2px solid skyblue;
            background-color: rgb(70, 68, 68);
            color: white;
            font-size: 19px;
            font-weight: bold;
            text-align: center;
        }

        td {
            border: 1px solid skyblue;
            padding: 10px;
        }
    </style>
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
