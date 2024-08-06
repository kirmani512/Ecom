<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <a href="">
                            <div class="img-box">
                                <img src="products/<?php echo e($products->image); ?>" alt="">
                            </div>
                            <div class="detail-box">
                                <h6><?php echo e($products->title); ?></h6>
                                <h6>Price
                                    <span> <?php echo e($products->price); ?></span>
                                </h6>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>
<?php /**PATH D:\xampp\htdocs\ecommerce_project\resources\views/home/product.blade.php ENDPATH**/ ?>