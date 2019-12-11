<?php
    require_once("../config/database.php");
    require_once("../model/user.php");
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $n = $user->getByEmail($email)->num_rows;
    if($n==0){
        header('Location:../template/login.php?error');
    }else{
        $result = $user->getByEmail($email)->fetch_assoc();
        $username = $result["username"];
        $status = $user->getStatus($username);
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


