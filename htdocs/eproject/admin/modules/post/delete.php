<?php
if (!isset($_GET["id"])) {
    header("location:index.php?module=post&action=index");
    exit();
} else {
    $id = $_GET["id"];

    if (!check_post_id ($conn,$id)) {
        header("location:index.php?module=post&action=index");
        exit();
    }

    $p_title= get_post ($conn,$id);

    if (file_exists('../public/upload/'.$p_title["image"])) {
        unlink('../public/upload/'.$p_title["image"]);
    }

    delete_post ($conn,$id);

    header("location:index.php?module=post&action=index");
    exit();
}
?>