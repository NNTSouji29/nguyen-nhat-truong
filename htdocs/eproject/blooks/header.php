<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 0355130171</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> truongnntcs20026@fpt.edu.vn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->
    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="public/images/home/goshop.png"  alt="" /></a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                            <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href=""><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="http://localhost:/eproject/modules/cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <li><a href="http://localhost/eproject/modules/login.php"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->
    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <?php
                                $stmt_category = $conn->prepare("SELECT * FROM category WHERE parent = 0");
                                $stmt_category->execute();
                                $data_stmt_category = $stmt_category->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($data_stmt_category as $item) {
                            ?>
                            <li><a href="index.php?p=<?php echo $item["name"]?>" class="active"><?php echo $item["name"]?></a></li>
                            <?php } ?>
<!--                            <li class="dropdown">-->
<!--                                <a href="#">Shop<i class="fa fa-angle-down"></i></a>-->
<!--                                <ul role="menu" class="sub-menu">-->
<!--                                    <li><a href="shop.html">Products</a></li>-->
<!--                                    <li><a href="product-details.html">Product Details</a></li>-->
<!--                                    <li><a href="checkout.html">Checkout</a></li>-->
<!--                                    <li><a href="cart.php">Cart</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
