<?php
    session_start();
    if($_SESSION['username']==null){
        header('Location:../assignment/templates/login.php');
        die();
    }
