<?php
    session_start();
    if($_SESSION['username']!=null){
        unset($_SESSION['username']);
        header('Location:../templates/login.php');
    }
