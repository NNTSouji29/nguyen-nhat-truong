<?php
if (!isset($_GET["id"])) {
    header("location:index.php?module=product&action=index");
    exit();
} else {
    $id = $_GET["id"];

    if (!check_product_id ($conn,$id)) {
        header("location:index.php?module=product&action=index");
        exit();
    }

    $product = get_product ($conn,$id);

    if (file_exists('../public/upload/'.$product["image"])) {
        unlink('../public/upload/'.$product["image"]);
    }

    delete_product ($conn,$id);

    header("location:index.php?module=product&action=index");
    exit();
}
?>