<?php
function create_cart($conn,$product) {
    $stmt = $conn->prepare("INSERT INTO `cart`(`email`,`fullname`,`address`,`phone`,`total_cart`) 
VALUES (:email,:fullname,:address,:phone,:total_cart)");
    $stmt->bindParam(':email',$product["email"],PDO::PARAM_STR);
    $stmt->bindParam(':fullname',$product["fullname"],PDO::PARAM_STR);
    $stmt->bindParam(':address',$product["address"],PDO::PARAM_STR);
    $stmt->bindParam(':phone',$product["phone"],PDO::PARAM_INT);
    $stmt->bindParam(':total_cart',$product["total_cart"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function edit_cart ($conn,$product) {
    $stmt = $conn->prepare("UPDATE cart SET 
     email= :email,fullname= :fullname,address= :address ,phone= :phone ,total_cart= :total_cart WHERE id =".$_GET["id"]);
    $stmt->bindParam(':email',$product["email"],PDO::PARAM_STR);
    $stmt->bindParam(':fullname',$product["fullname"],PDO::PARAM_STR);
    $stmt->bindParam(':address',$product["address"],PDO::PARAM_STR);
    $stmt->bindParam(':phone',$product["phone"],PDO::PARAM_INT);
    $stmt->bindParam(':total_cart',$product["total_cart"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function check_cart_exist ($conn,$data,$edit = false) {
    if (!$edit) {
        $stmt = $conn->prepare("SELECT email FROM cart WHERE email = :email");
    } else {
        $stmt = $conn->prepare("SELECT email FROM cart WHERE email = :email AND id != :id");
        $stmt->bindParam(':id',$data["id"],PDO::PARAM_STR);
    }

    $stmt->bindParam(':email',$data["email"],PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return false;
    }

    return true;
}

function get_all_cart ($conn,$edit = false,$id = null) {
    if ($edit){
        $stmt = $conn->prepare("SELECT * FROM cart WHERE id != :id");
        $stmt->bindParam("id",$id,PDO::PARAM_STR);
    }else{
        $stmt = $conn->prepare("SELECT * FROM cart");
    }

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function get_cart ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM cart WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function check_cart_id ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM cart WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return true;
    }

    return false;
}

function delete_cart ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();

    return $stmt;
}

?>

