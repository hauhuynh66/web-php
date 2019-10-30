<?php
    session_start();
    if($_SESSION['username']!=null){
        unset($_SESSION['username']);
    }
    if($_COOKIE['username']!=null){
        setcookie("user", "", time() - 3600);
    }
    header('Location:../templates/login.php');
