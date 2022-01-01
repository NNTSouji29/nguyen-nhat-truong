<?php
if (!isset($_GET["id"])) {
    header("location:index.php?module=cart&action=index");
    exit();
} else {
    $id = $_GET["id"];

    if (!check_cart_id ($conn,$id)) {
        header("location:index.php?module=cart&action=index");
        exit();
    }

    $product = get_cart ($conn,$id);
    delete_cart ($conn,$id);

    header("location:index.php?module=cart&action=index");
    exit();
}
?>