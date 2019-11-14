<?php
    require_once("../config/database.php");
    require_once("../model/user.php");
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember_me = $_POST["remember-me"];
    $n = $user->get_by_email($email)->num_rows;
    if($n==0){
        header('Location:../template/login.php?error');
    }else{
        $result = $result = $user->get_by_email($email)->fetch_assoc();
        $status = $user->get_role($username,"status");
        if($status!="ACTIVE"){
            header("Location:../template/login.php?blocked");
        }else{
            if(password_verify($password,$result["password"])){
                $_SESSION['username'] = $result["username"];
                header('Location:../template/index.php');
            }else{
                header('Location:../template/login.php?error');
            }
        }
    }


