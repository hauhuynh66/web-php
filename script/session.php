<?php
    session_start();
    if($_SESSION['username']==null){
        if($_COOKIE["username"]==null){
            header('Location:./login.php');
            die();
        }
    }
