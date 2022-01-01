<?php
include '../config.php';
include '../libs/connect.php';
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/css/prettyPhoto.css" rel="stylesheet">
    <link href="../public/css/price-range.css" rel="stylesheet">
    <link href="../public/css/animate.css" rel="stylesheet">
    <link href="../public/css/main.css" rel="stylesheet">
    <link href="../public/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../public/js/html5shiv.js"></script>
    <script src="../public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="../public/images/home/goshop.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right clearfix">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canada</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canadian Dollar</a></li>
                                <li><a href="">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                            <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
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
                            <li><a href="http://localhost/eproject/index.php?p=Home">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="checkout.php">Checkout</a></li>
                                    <li><a href="http://localhost/eproject/index.php?p=Home" class="active">Cart</a></li>
                                </ul>
                            </li>
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
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="http://localhost/eproject/index.php?p=Home">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="cart_total" ></td>
                    <td class="cart_total">ID</td>
                    <td class="price">price</td>
                    <td class="text-center">Name</td>
                    <td class=" text-center">Total_cart</td>
                    <td class="cart_total">total</td>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $total =0;
                    if (!empty($_SESSION["giohang"])){
                    foreach ($_SESSION["giohang"] as $id => $total_cart)   {
                            global $conn;
                            $stmt = $conn->prepare("SELECT * FROM product WHERE  id = :id");
                            $stmt ->bindParam(":id", $id, PDO::PARAM_INT);
                            $stmt ->execute();
                        $product = $stmt->fetch(PDO::FETCH_ASSOC);
                        //var_dump( $product);die;
                           // $product = $stmt ->fetch(PDO::FETCH_ASSOC);

                        ?>
                        <tr>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="javascript:void(0)">
                                    <i class="fa fa-times removeItemCart" > <input type="hidden" name="id" data-id="<?php echo $id ?>"></i></a>
                            </td>
                            <td><?php echo $product["id"] ?></td>
                            <td class="cart_total"><?php  echo number_format($product["price"],0,"",".") ?> </td>
                            <td class="text-center">
                                <div class="cart_total text-center">
                                    <h6 class="mb-0 ms-3"><?php echo $product["name"] ?></h6>
                                </div>
                            </td>
                            <td class="text-center ">
<!--                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary " class="minus">-->
<!--                                    <input type="hidden" name="minus" data-id="--><?php //echo $id ?><!--">-</button>-->

                                <button class="btn btn-icon btn-soft-primary minus">
                                    -</button>
                                <input  min="0" name="total_cart" value="<?php echo $total_cart; ?>"   type="number">
                                <button class="btn btn-icon btn-soft-primary plus">
                                   +</button>
                            </td>
                            <td class="cart_total"><?php
                                $total += $product["price"] * $total_cart;
                                echo number_format($product["price"] * $total_cart,0,"",".")?>
                            </td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
            <hr>
            <table class="table table-condensed">
                <thead>
                <td class="col-xs-1" align="center">Total</td>
                <td class="col-xs-1" align="center"><?php echo number_format($total,0,"",".") ?></td>
                </tr>
                </thead>
            </table>
            <hr>
            <div class="class="col-xs-1" align="center"">
                <a href="" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
</section>


<footer id="footer">
    <!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>2HT</span>- iphone</h2>
                        <p>nothing says #Fast service like the way the ex-lover turned back!</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="../public/upload/Fip7+.jfif" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>september 26th 2000</h2>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="../public/upload/Fip7.jfif" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="../public/upload/Fip7+.jfif" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>september 26th 2000</h2>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="../public/upload/ip7+D.jfif" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>september 26th 2000</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="../public/images/home/map.png" alt="" />
                        <p>we come from Viet Nam!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Truong Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">iphone7</a></li>
                            <li><a href="#">iphone7plus</a></li>
                            <li><a href="#">iphone8</a></li>
                            <li><a href="#">iphone8plus</a></li>
                            <li><a href="#">iphoneSE</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">insurance</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Truong shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2> Truong shop </h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="../public/js/jquery.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/jquery.scrollUp.min.js"></script>
<script src="../public/js/jquery.prettyPhoto.js"></script>
<script src="../public/js/main.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.8/jquery.min.is"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/d3js/7.0.0/d3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script  type = "text/javascript">
    $(document).ready(function(){
        $(".cart_quantity_delete").click(function() {
            const id = $("input[name='id']").data("id");
            console.log(id);
            $.ajax({
                type: "GET",
                url: "http://localhost/eproject/ajax/cart.php",
                data: {delete: id},
                dataType: 'html',
                success: function (response) {
                    window.location.reload();
                }
            });
        });
        $(".plus").click(function(e) {
            e.preventDefault();
            console.log(e);
            const id = $("input[name='id']").data("id");
          //  console.log(id);
            $.ajax({
                type: "GET",
                url: "http://localhost/eproject/ajax/cart.php",
                data: {increase: id},
                dataType: 'html',
                success: function (response) {
                    //alert(response)
                     window.location.reload();
                }
            });
        });
    });
    $(document).ready(function(){
        $(".minus").click(function() {
            const id = $("input[name='id']").data("id");
            console.log(id);
            $.ajax({
                type: "GET",
                url: "http://localhost/eproject/ajax/cart.php",
                data: {decrease: id},
                dataType: 'html',
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    });
</script>
</body>
</html>