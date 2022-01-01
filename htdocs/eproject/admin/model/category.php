<?php
function create_category($conn,$data){
    $stmt = $conn->prepare("INSERT INTO category (name,parent) VALUES (:name,:parent)");
    $stmt->bindParam(':name',$data['name'],PDO::PARAM_STR);
    $stmt->bindParam(':parent',$data['parent'],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}
function check_category_exist($conn,$data,$edit=false){
    if (!$edit){
        $stmt=$conn->prepare("SELECT name FROM category WHERE name=:name");
    }else{
        $stmt=$conn->prepare("SELECT name FROM category WHERE name=:name AND id != :id");
        $stmt->bindParam(':id',$data['id'],PDO::PARAM_STR);
    }
    $stmt->bindParam(':name',$data['name'],PDO::PARAM_STR);
    $stmt->execute();
    $count=$stmt->rowCount();
    if($count > 0){
        return false;
    }
    return true;
}
function get_all_category ($conn,$edit = false,$id = null) {
    if ($edit){
        $stmt = $conn->prepare("SELECT * FROM category WHERE id != :id");
        $stmt->bindParam("id",$id,PDO::PARAM_STR);
    }else{
        $stmt = $conn->prepare("SELECT * FROM category");
    }

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
function get_category ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM category WHERE id=:id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}
function check_category_id ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM category WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        return true;
    }
    return false;
}
function edit_category($conn,$data){
    $stmt = $conn->prepare("UPDATE category SET name=:name, parent=:parent WHERE id=:id");
    $stmt->bindParam(':name',$data['name'],PDO::PARAM_STR);
    $stmt->bindParam(':parent',$data['parent'],PDO::PARAM_INT);
    $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}
function check_category_child ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM category WHERE parent = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        return false;
    }
    return true;
}
function delete_category ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM category WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();

    return $stmt;
}
?>
