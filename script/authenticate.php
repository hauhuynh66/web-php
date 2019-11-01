<?php
    require("db.php");
    include_once("user-query.php");
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember_me = $_POST["remember-me"];
    $result = get_user_by_email($conn,$email)->fetch_assoc();
    if($result!=null){
        $role = get_user_role($conn,$result["username"])->fetch_assoc();
        if($role["status"]!="ACTIVE"){
            header("Location:../templates/login.php?blocked");
        }else{
            if(password_verify($password,$result["password"])){
                $_SESSION['username'] = $result["username"];
                if($remember_me==true){
                    setcookie("username",$result["username"],time()+3600*24*7,'/');
                }
                header('Location:../templates/index.php');
            }else{
                header('Location:../templates/login.php?error');
            }
        }

    }else{
        header('Location:../templates/login.php?error');
    }


