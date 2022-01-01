<?php
function check_user_exist ($conn,$data,$edit = false) {
    if (!$edit) {
        $stmt = $conn->prepare("SELECT email FROM user WHERE email = :email");
    } else {
        $stmt = $conn->prepare("SELECT email FROM user WHERE email = :email AND id != :id");
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

function create_user ($conn,$user) {
    $stmt = $conn->prepare("INSERT INTO user (name,email,password,level) VALUES (:name,:email,:password,:level)");
    $stmt->bindParam(':email',$user["email"],PDO::PARAM_STR);
    $stmt->bindParam(':password',$user["password"],PDO::PARAM_STR);
    $stmt->bindParam(':level',$user["level"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function get_all_user ($conn) {
    $stmt = $conn->prepare("SELECT * FROM user ORDER BY id DESC");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function get_user ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function check_user_id ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        return true;
    }

    return false;
}

function edit_user ($conn,$user) {
    $stmt = $conn->prepare("UPDATE user SET password = :password, level = :level WHERE id = :id");
    $stmt->bindParam(':password',$user["password"],PDO::PARAM_STR);
    $stmt->bindParam(':level',$user["level"],PDO::PARAM_INT);
    $stmt->bindParam(':id',$user["id"],PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function delete_user ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM user WHERE id = :id");
    $stmt->bindParam(':id',$id,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

?>