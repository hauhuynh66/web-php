<?php
    include_once("user-query.php");
    session_start();
    if(isset($_SESSION["username"])){
        $success = update_active_time($conn,$_SESSION["username"]);
        unset($_SESSION['username']);
    }
    if(isset($_COOKIE["user"])){
        setcookie("user", "", time() - 3600);
    }
    header('Location:../template/login.php');
