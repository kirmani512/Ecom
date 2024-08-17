<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
            <span>
                Selling Yard
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(url('/')); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.html">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="why.html">
                        Why Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="testimonial.html">
                        Testimonial
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
            </ul>
            <div class="user_option">
                <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                    
                    <a href="<?php echo e(url('myorders')); ?>">
                    My orders
                    </a>

                    <a href="<?php echo e(url('mycart')); ?>">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        <?php echo e($count); ?>

                    </a>
                        <form style="padding: 15px" method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>

                            <input class="btn btn-success" type="submit" value="Logout">
                        </form>
                    <?php else: ?>
                        <a href="<?php echo e(url('/login')); ?>">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Login
                            </span>
                        </a>

                        <a href="<?php echo e(url('/register')); ?>">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>
                                Register
                            </span>
                        </a>



                <?php endif; ?>
                <?php endif; ?>


            </div>
        </div>
    </nav>
</header>
<?php /**PATH D:\xampp\htdocs\ecommerce_project\resources\views/home/header.blade.php ENDPATH**/ ?>