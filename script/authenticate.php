<?php
    require("db.php");
    include_once("user.php");
    session_start();
    $user = new user($conn);
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember_me = $_POST["remember-me"];
    $result = $user->get_by_email($email)->fetch_assoc();
    if($result!=null){
        $status = $user->get_role($username,"status");
        if($status!="ACTIVE"){
            header("Location:../template/login.php?blocked");
        }else{
            if(password_verify($password,$result["password"])){
                $_SESSION['username'] = $result["username"];
                if($remember_me==true){
                    setcookie("username",$result["username"],time()+3600*24*7,'/');
                }
                header('Location:../template/index.php');
            }else{
                header('Location:../template/login.php?error');
            }
        }

    }else{
        header('Location:../template/login.php?error');
    }


