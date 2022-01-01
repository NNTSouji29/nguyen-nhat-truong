<?php
if (!isset($_GET["id"])) {
    header("location:index.php?module=cart_detail&action=index");
    exit();
} else {
    $id = $_GET["id"];

    if (!check_cart_detail_id ($conn,$id)) {
        header("location:index.php?module=cart_detail&action=index");
        exit();
    }

    $product = get_cart_detail ($conn,$id);
    delete_cart_detail ($conn,$id);

    header("location:index.php?module=cart_detail&action=index");
    exit();
}
?>