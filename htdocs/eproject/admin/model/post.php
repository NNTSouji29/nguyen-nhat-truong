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

function create_post ($conn,$post) {
    $stmt = $conn->prepare("INSERT INTO `post`(`title`, `content`, `image`) VALUES (:title, :content, :image)");
    $stmt->bindParam(':title',$post["title"],PDO::PARAM_STR);
    $stmt->bindParam(':content',$post["content"],PDO::PARAM_STR);
    $stmt->bindParam(':image',$post["image"],PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

function edit_post ($conn,$post) {
    $stmt = $conn->prepare("UPDATE post SET title= :title,content= :content,image= :image WHERE id = :id");
    $stmt->bindParam(':title',$post["title"],PDO::PARAM_STR);
    $stmt->bindParam(':content',$post["content"],PDO::PARAM_STR);
    $stmt->bindParam(':image',$post["image"],PDO::PARAM_STR);
    $stmt->bindParam(':id',$post["id"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function check_post_exist ($conn,$data,$edit = false) {
    if (!$edit) {
        $stmt = $conn->prepare("SELECT title FROM post WHERE title = :title");
    } else {
        $stmt = $conn->prepare("SELECT title FROM post WHERE title = :title AND id != :id");
        $stmt->bindParam(':id',$data["id"],PDO::PARAM_STR);
    }

    $stmt->bindParam(':title',$data["title"],PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return false;
    }

    return true;
}

function get_all_post ($conn,$edit = false,$id = null) {
    if ($edit){
        $stmt = $conn->prepare("SELECT * FROM post WHERE id != :id");
        $stmt->bindParam("id",$id,PDO::PARAM_STR);
    }else{
        $stmt = $conn->prepare("SELECT * FROM post");
    }

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function get_post ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM post WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function check_post_id ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM post WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return true;
    }

    return false;
}

function delete_post ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM post WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();

    return $stmt;
}

?>
