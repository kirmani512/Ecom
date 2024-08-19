<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        h1 {
            color: white;
        }

        label {
            display: inline-block;
            width: 200px;
            font-size: 18px !important;
            color: white !important;
        }

        input[type='text'] {
            width: 350px;
            height: 50px;
        }

        textarea {
            width: 450px;
            height: 80px;
        }

        .input_deg {
            padding: 15px;
        }

        .table_deg td {
            padding: 20px;
        }
    </style>
</head>

<body>

    @include('admin.header')


    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1>Add Product</h1>
                </div>
            </div>
            <div class="div_deg">
                <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table_deg">
                        <tr>
                            <td>
                                {{-- <div class="input_deg"> --}}
                                <label> Product Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" required>
                            </td>
                            {{-- </div> --}}
                        </tr>
                        <tr>
                            {{-- <div> --}}
                            <td>
                                <label> Description</label>
                            </td>
                            <td>
                                <textarea name="description" required></textarea>
                            </td>
                            {{-- </div> --}}
                        </tr>
                        <tr>
                            {{-- <div class="input_deg"> --}}
                            <td>
                                <label> Price</label>
                            </td>
                            <td>
                                <input type="text" name="price" required>
                            </td>
                            {{-- </div> --}}
                        </tr>
                        <tr>
                            {{-- <div class="input_deg"> --}}
                            <td>
                                <label> Quantity</label>
                            </td>
                            <td>
                                <input type="number" name="qty" required>
                            </td>
                            {{-- </div> --}}
                        </tr>
                        <tr>
                            {{-- <div> --}}
                            <td>
                                <label> Product Category</label>
                            </td>
                            <td>
                                <select name="category" required>
                                    <option>Select a Option</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            {{-- </div> --}}
                        </tr>
                        <tr>
                            <td>
                                {{-- <div class="input_deg"> --}}
                                <label> Product Image</label>
                            </td>
                            <td>
                                <input type="file" name="image">
                            </td>
                            {{-- </div> --}}
                            {{-- <div class="input_deg"> --}}
                            <td>
                                <input class="btn btn-success" type="submit" value="Add Product">
                            </td>
                            {{-- </div> --}}
                        </tr>
                    </table>
                </form>
            </div>
            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                        <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank"
                                href="https://templateshub.net">Templates Hub</a>.</p>
                    </div>
                </div>
            </footer>
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
