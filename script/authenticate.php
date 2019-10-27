<?php
    require("db.php");
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember_me = $_POST["remember_me"];
    $table_name = "users";
    $sql = "select * from $table_name where email = '$email'";
    $result = mysqli_query($conn,$sql)->fetch_assoc();
    if(password_verify($password,$result["password"])){
        $_SESSION['username'] = $result["username"];
        header('Location:../templates/index.php');
    }else{
        var_dump($password);
        header('Location:../templates/login.php?error=true');
    }

