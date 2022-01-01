<?php
session_start();
ob_start();

//var_dump($_GET["delete"]);die;
if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    unset($_SESSION["giohang"][$id]);
//    echo $_GET["delete"];
}
elseif(isset($_GET["decrease"])){
    $id = $_GET["decrease"];
    $_SESSION["giohang"][$id] = $_SESSION["giohang"][$id] - 1;
}
elseif(isset($_GET["increase"])){
    $id = $_GET["increase"];
    $_SESSION["giohang"][$id] = $_SESSION["giohang"][$id] + 1;
}
else{
    $product_id = $_POST["product_id"];
    $total_cart = $_POST["total_cart"];

    if($_POST["total_cart"] > 10){
        $total_cart =10;
    }
    elseif($_POST["total_cart"] <= 0){
        $total_cart = 1;
    }
    else {
        $total_cart = $_POST["total_cart"];
    }


    $_SESSION["giohang"][$product_id]= $total_cart;

}
