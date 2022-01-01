<?php
function login ($conn,$data) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email AND password = :password AND level = 1");
    $stmt->bindParam(":email",$data["email"],PDO::PARAM_STR);
    $stmt->bindParam(":password",$data["password"],PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return true;
    }
    return false;
}

function get_user ($conn,$data) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email AND password = :password AND level = 1");
    $stmt->bindParam(":email",$data["email"],PDO::PARAM_STR);
    $stmt->bindParam(":password",$data["password"],PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>