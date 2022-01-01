<?php
function get_all_category ($conn,$edit = false,$id = null) {
    if ($edit) {
        $stmt = $conn->prepare("SELECT * FROM category WHERE id != :id");
        $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    } else {
        $stmt = $conn->prepare("SELECT * FROM category");
    }

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function create_collection ($conn,$product) {
    $stmt = $conn->prepare("INSERT INTO `collection`(`name`,  `image`, `category_id`) VALUES (:name, :image, :category_id)");
    $stmt->bindParam(':name',$product["name"],PDO::PARAM_STR);
    $stmt->bindParam(':image',$product["image"],PDO::PARAM_STR);
    $stmt->bindParam(':category_id',$product["category_id"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function edit_collection ($conn,$product) {
    $stmt = $conn->prepare("UPDATE collection SET name= :name,image= :image,category_id= :category_id WHERE id = :id");
    $stmt->bindParam(':name',$product["name"],PDO::PARAM_STR);
    $stmt->bindParam(':image',$product["image"],PDO::PARAM_STR);
    $stmt->bindParam(':category_id',$product["category_id"],PDO::PARAM_INT);
    $stmt->bindParam(':id',$product["id"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function check_collection_exist ($conn,$data,$edit = false) {
    if (!$edit) {
        $stmt = $conn->prepare("SELECT name FROM collection WHERE name = :name");
    } else {
        $stmt = $conn->prepare("SELECT name FROM collection WHERE name = :name AND id != :id");
        $stmt->bindParam(':id',$data["id"],PDO::PARAM_STR);
    }

    $stmt->bindParam(':name',$data["name"],PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return false;
    }

    return true;
}

function get_all_collection ($conn) {
    $stmt = $conn->prepare("SELECT p.*,c.name as cname FROM collection as p, category as c WHERE p.category_id = c.id ORDER BY p.id DESC");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function get_collection ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM collection WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function check_collection_id ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM collection WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return true;
    }

    return false;
}

function delete_collection ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM collection WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();

    return $stmt;
}

?>
