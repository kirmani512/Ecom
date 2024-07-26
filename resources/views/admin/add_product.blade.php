<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
.div_deg{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 60px;
}
h1{
    color: white;
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
                <form action="">
                    <div>
                        <label> Product Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div>
                        <label> Description</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div>
                        <label> Price</label>
                        <input type="text" name="price" required>
                    </div>
                    <div>
                        <label> Quantity</label>
                        <input type="number" name="qty" required>
                    </div>
                    <div>
                        <label> Product Category</label>
                        <select>
                            <option>abc</option>
                        </select>
                    </div>
                    <div>
                        <label> Product Image</label>
                        <input type="file" name="image">
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
