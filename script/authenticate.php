<?php
    require("db.php");
    include_once("user-query.php");
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember_me = $_POST["remember-me"];
    $table_name = "users";
    $result = get_user_by_email($conn,$email)->fetch_assoc();
    if(password_verify($password,$result["password"])){
        $_SESSION['username'] = $result["username"];
        if($remember_me==true){
            setcookie("username",$result["username"],time()+3600*24*7,'/');
        }
        header('Location:../templates/index.php');
    }else{
        header('Location:../templates/login.php?error=true');
    }

