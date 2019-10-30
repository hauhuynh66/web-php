<?php
    session_start();
    if(!isset($_SESSION['username'])){
        if(!isset($_COOKIE['username'])){
            header('Location:./login.php');
            die();
        }else{
            $_SESSION['username'] = $_COOKIE['username'];
        }
    }
