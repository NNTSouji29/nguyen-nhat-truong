<?php
function create_cart_detail($conn,$product) {
    $stmt = $conn->prepare("INSERT INTO `cart_detail`(`product_id`,`cart_id`,`quantily`,`price`) 
VALUES (:product_id,:cart_id,:quantily ,:price)");
    $stmt->bindParam(':product_id',$product["product_id"],PDO::PARAM_INT);
    $stmt->bindParam(':cart_id',$product["cart_id"],PDO::PARAM_INT);
    $stmt->bindParam(':quantily',$product["quantily"],PDO::PARAM_INT);
    $stmt->bindParam(':price',$product["price"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function edit_cart_detail ($conn,$product) {
    $stmt = $conn->prepare("UPDATE cart_detail SET 
     product_id= :product_id,cart_id= :cart_id,quantily= :quantily,price= :price WHERE id =".$_GET["id"]);
    $stmt->bindParam(':product_id',$product["product_id"],PDO::PARAM_INT);
    $stmt->bindParam(':cart_id',$product["cart_id"],PDO::PARAM_INT);
    $stmt->bindParam(':quantily',$product["quantily"],PDO::PARAM_INT);
    $stmt->bindParam(':price',$product["price"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function check_cart_detail_exist ($conn,$data,$edit = false) {
    if (!$edit) {
        $stmt = $conn->prepare("SELECT product_id FROM cart_detail WHERE product_id = :product_id");
    } else {
        $stmt = $conn->prepare("SELECT product_id FROM cart_detail WHERE product_id = :product_id AND id != :id");
        $stmt->bindParam(':id',$data["id"],PDO::PARAM_STR);
    }

    $stmt->bindParam(':product_id',$data["product_id"],PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return false;
    }

    return true;
}

function get_all_cart_detail ($conn,$edit = false,$id = null) {
    if ($edit){
        $stmt = $conn->prepare("SELECT * FROM cart_detail WHERE id != :id");
        $stmt->bindParam("id",$id,PDO::PARAM_STR);
    }else{
        $stmt = $conn->prepare("SELECT * FROM cart_detail");
    }

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function get_cart_detail ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM cart_detail WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function check_cart_detail_id ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM cart_detail WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return true;
    }

    return false;
}

function delete_cart_detail ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM cart_detail WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();

    return $stmt;
}

?>

