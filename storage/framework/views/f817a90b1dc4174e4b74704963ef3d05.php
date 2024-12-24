<!DOCTYPE html>
<html>

<head>
    <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 50px;
        }

        .div_dig {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        .table_deg {
            text-align: center;
            margin: auto;
            border: 2px solid yellowgreen;
            margin-top: 50px;
            width: 600px;
        }

        th {
            background-color: skyblue;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid;
        }
    </style>
</head>

<body>

    <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1 style="color: white">Add Category</h1>
                    <div class="div_dig">
                        <form action="<?php echo e(url('add_category')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div>
                                <input type="text" name="category">

                                <input class="btn btn-primary" type="submit" value="Add Category">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <div>
                <table class="table_deg">
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($category->category_name); ?></td>
                            <td>
                                <a class="btn btn-danger" onclick="confirmation(event)"
                                    href="<?php echo e(url('delete_category', $category->id)); ?>">Delete</a>
                                <a class="btn btn-success" href="<?php echo e(url('edit_category', $category->id)); ?>">Edit</a>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- JavaScript files-->
        <script type="text/javascript">
            function confirmation(ev) {
                ev.preventDefault();

                var urlToRedirect = ev.currentTarget.getAttribute('href');

                console.log(urlToRedirect);
                swal({
                        title: "Are you sure to delete this",
                        text: 'This delete will be permanent',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willCancel) => {
                        if (willCancel) {
                            window.location.href = urlToRedirect;
                        }
                    });
            }
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="<?php echo e(asset('admincss/vendor/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('admincss/vendor/popper.js/umd/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('admincss/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('admincss/vendor/jquery.cookie/jquery.cookie.js')); ?>"></script>
        <script src="<?php echo e(asset('admincss/vendor/chart.js/Chart.min.js')); ?>"></script>
        <script src="<?php echo e(asset('admincss/vendor/jquery-validation/jquery.validate.min.js')); ?>"></script>
        <script src="<?php echo e(asset('admincss/js/charts-home.js')); ?>"></script>
        <script src="<?php echo e(asset('admincss/js/front.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\ecommerce_project\resources\views/admin/category.blade.php ENDPATH**/ ?>