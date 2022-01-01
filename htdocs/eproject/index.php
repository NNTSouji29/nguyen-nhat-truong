<?php
include 'config.php';
include 'libs/connect.php';
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
    <title>Home | E-Shopper</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/css/prettyPhoto.css" rel="stylesheet">
    <link href="public/css/price-range.css" rel="stylesheet">
    <link href="public/css/animate.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">
    <link href="public/css/responsive.css" rel="stylesheet">

    <script src="public/js/html5shiv.js"></script>
    <script src="public/js/respond.min.js"></script>

    <link rel="shortcut icon" href="public/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="public/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
<?php include 'blooks/header.php'; ?>
<?php
if (isset($_GET["p"])){
    $p = $_GET["p"];
    switch ($p){
        case 'Home':
            include 'modules/home.php';
            break;
        case 'detail':
            include 'modules/detail.php';
            break;
        case 'Category':
            include 'modules/category.php';
            break;
        case 'checkout':
            include 'modules/checkout.php';
            break;
        case 'cart':
            include 'modules/cart.php';
            break;
        case 'Collection':
            include 'modules/collection.php';
            break;
        case 'error':
            include 'modules/error.php';
            break;
        case 'post':
            include 'modules/post_single.php';
            break;
        case 'Contact':
            include 'modules/contact.php';
            break;
        default: include 'modules/home.php';
    }
}else {
    include 'modules/home.php';
}
?>
<?php include 'blooks/footer.php'; ?>
<script src="public/js/jquery.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/jquery.scrollUp.min.js"></script>
<script src="public/js/price-range.js"></script>
<script src="public/js/jquery.prettyPhoto.js"></script>
<script src="public/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script  type = "text/javascript">
    $(document).ready(function(){
        $("#addcart").click(function(){
            const total_cart = $("input[name='total_cart']").val();
            const product_id = $("input[name='product_id']").data("id");
            $.ajax({
                type: "POST",
                url: "http://localhost/eproject/ajax/cart.php",
                data: {product_id: product_id , total_cart: total_cart},
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                success: function(result){
                    // console.log(result);
                    window.location = "http://localhost/eproject/modules/cart.php";
                }
            });
        });
    });
</script>
</body>
</html>

