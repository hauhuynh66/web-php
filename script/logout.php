<?php
    include_once("user.php");
    session_start();
    $user = new user($conn);
    if(isset($_SESSION["username"])){
        $success = $user->update_active_time($_SESSION["username"]);
        unset($_SESSION['username']);
    }
    if(isset($_COOKIE["user"])){
        setcookie("user", "", time() - 3600);
    }
    header('Location:../template/login.php');
