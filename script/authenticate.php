<?php
    require("db.php");
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $table_name = "users";
    $sql = "select * from $table_name where email = '$email'";
    $result = mysqli_query($conn,$sql)->fetch_assoc();
    if(password_verify($password,$result["password"])){
        $_SESSION['username'] = $result["username"];
        header('Location:../templates/index.php');
    }else{
        echo "Bad Credentials";
    }

