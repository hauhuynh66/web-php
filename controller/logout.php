<?php
    include_once("../model/user.php");
    session_start();
    $user = new user($conn);
    if(isset($_SESSION["username"])){
        $success = $user->updateTime($_SESSION["username"]);
        unset($_SESSION['username']);
    }
    if(isset($_COOKIE["user"])){
        setcookie("user", "", time() - 3600);
    }
    header('Location:/assignment/template/login.php');
