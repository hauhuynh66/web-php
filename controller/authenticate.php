<?php
    require_once("../config/database.php");
    require_once("../model/user.php");
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $n = $user->get_by_email($email)->num_rows;
    if($n==0){
        header('Location:../template/login.php?error');
    }else{
        $result = $user->get_by_email($email)->fetch_assoc();
        $username = $result["username"];
        $status = $user->get_role($username,"status");
        echo $status;
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


