<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        label {
            display: inline-block;
            width: 200px;
            padding: 20px;
            color: white;
        }

        input[type='text'] {
            width: 300px;
            height: 60px;
        }

        textarea {
            width: 450px;
            height: 100px;
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
                    <h2 class="h5 no-margin-bottom">Update Product</h2>
                </div>
            </div>


            <div class="div_deg">
                <form action="{{url('edit_product',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $data->title }}">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea name="description">{{ $data->description }}</textarea>
                    </div>
                    <div>
                        <label>Price</label>
                        <input type="text" name="price" value="{{ $data->price }}">
                    </div>
                    <div>
                        <label>Quantity</label>
                        <input type="number" name="quantity" value="{{ $data->quantity }}">
                    </div>
                    <div>
                        <label>Category</label>
                        <select name="category">
                            <option value="{{ $data->category }}">{{ $data->category }}</option>
                            @foreach ($category as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label> Current Image</label>
                        <img width="150" src="/products/{{ $data->image }}">
                    </div>
                    <div>
                        <label> New Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="Update Product">
                    </div>
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