<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        table {
            border: 2px solid skyblue;
            text-align: center;
        }

        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid skyblue;
        }

        a {
            margin: 10px;
        }
    </style>
</head>

<body>

    @include('admin.layout.header')


    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.layout.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Orders List</h2>
                </div>
            </div>
            <div class="table_center">

                <table>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Change Status</th>
                        <th>Print PDF</th>


                    </tr>
                    @foreach ($data as $data)
                        @foreach ($data->items as $item)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->product->price }}</td>
                                <td>
                                    <img width="150" src="products/{{ $item->product->image }}">
                                </td>
                                <td>

                                    @if ($data->status == 'in progress')
                                        <span style="color: rgb(51, 219, 17)">{{ $data->status }}</span>
                                    @elseif($data->status == 'In Transit')
                                        <span style="color: rgb(177, 177, 221)">{{ $data->status }}</span>
                                    @else
                                        <span style="color: yellow">{{ $data->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url('in_transit', $data->id) }}">In Transit</a>

                                    <a class="btn btn-success" href="{{ url('deliver', $data->id) }}">Delivered</a>

                                </td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ url('print_pdf', $data->id) }}">Print</a>
                                </td>

                            </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
            @include('admin.layout.footer')
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>
