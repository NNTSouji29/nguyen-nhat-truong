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

function create_product ($conn,$product) {
    $stmt = $conn->prepare("INSERT INTO `product`(`name`, `price`, `intro`, `content`, `image`, `status`, `featured`, `category_id`) VALUES (:name, :price, :intro, :content, :image, :status, :featured, :category_id)");
    $stmt->bindParam(':name',$product["name"],PDO::PARAM_STR);
    $stmt->bindParam(':price',$product["price"],PDO::PARAM_INT);
    $stmt->bindParam(':intro',$product["intro"],PDO::PARAM_STR);
    $stmt->bindParam(':content',$product["content"],PDO::PARAM_STR);
    $stmt->bindParam(':image',$product["image"],PDO::PARAM_STR);
    $stmt->bindParam(':status',$product["status"],PDO::PARAM_INT);
    $stmt->bindParam(':featured',$product["featured"],PDO::PARAM_INT);
    $stmt->bindParam(':category_id',$product["category_id"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function edit_product ($conn,$product) {
    $stmt = $conn->prepare("UPDATE product SET name= :name,price= :price,intro= :intro,content= :content,image= :image,status= :status,featured= :featured,category_id= :category_id WHERE id = :id");
    $stmt->bindParam(':name',$product["name"],PDO::PARAM_STR);
    $stmt->bindParam(':price',$product["price"],PDO::PARAM_INT);
    $stmt->bindParam(':intro',$product["intro"],PDO::PARAM_STR);
    $stmt->bindParam(':content',$product["content"],PDO::PARAM_STR);
    $stmt->bindParam(':image',$product["image"],PDO::PARAM_STR);
    $stmt->bindParam(':status',$product["status"],PDO::PARAM_INT);
    $stmt->bindParam(':featured',$product["featured"],PDO::PARAM_INT);
    $stmt->bindParam(':category_id',$product["category_id"],PDO::PARAM_INT);
    $stmt->bindParam(':id',$product["id"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function check_product_exist ($conn,$data,$edit = false) {
    if (!$edit) {
        $stmt = $conn->prepare("SELECT name FROM product WHERE name = :name");
    } else {
        $stmt = $conn->prepare("SELECT name FROM product WHERE name = :name AND id != :id");
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

function get_all_product ($conn) {
    $stmt = $conn->prepare("SELECT p.*,c.name as cname FROM product as p, category as c WHERE p.category_id = c.id ORDER BY p.id DESC");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function get_product ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function check_product_id ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return true;
    }

    return false;
}

function delete_product ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM product WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();

    return $stmt;
}

?>
