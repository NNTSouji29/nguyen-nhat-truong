<?php
if (!isset($_GET["id"])) {
    header("location:index.php?module=collection&action=index");
    exit();
} else {
    $id = $_GET["id"];
    if (!check_collection_id ($conn,$id)) {
        header("location:index.php?module=collection&action=index");
        exit();
    }

    $collection = get_collection ($conn,$id);

    if (file_exists('../public/upload/'.$collection["image"])) {
        unlink('../public/upload/'.$collection["image"]);
    }

    delete_collection ($conn,$id);
    header("location:index.php?module=collection&action=index");
    exit();
}
?>