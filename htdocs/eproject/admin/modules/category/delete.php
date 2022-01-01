<?php
if (!isset($_GET['id'])) {
    header('location:index.php?module=category&action=index');
    exit();
} else {
    $id = $_GET['id'];
    if (!check_category_id($conn, $id)) {
        header('location:index.php?module=category&action=index');
        exit();
    }
    if (!check_category_child ($conn,$id)) {
        echo '<script>
            alert("could not remove this category")
            window.location.href="index.php?module=category&action=index"
        </script>';
        exit();
    } else {
        delete_category ($conn,$id);
        header("location:index.php?module=category&action=index");
        exit();
    }
}