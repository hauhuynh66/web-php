<?php
    require_once("../model/user.php");
    $call = $_POST["function"];
    if($call=="image_update"){
        $id = $_POST["i"];
        $username = $_POST["un"];
        $success = $user->update_image($username,$id);
        if($success){
            echo "OK";
        }else{
            echo "FAIL";
        }
    }else if($call=="ban"){
        $username = $_POST["username"];
        $success = $user->ban($username);
        if($success){
            echo "OK";
        }else{
            echo "FAIL";
        }
    }else if($call=="unban"){
        $username = $_POST["username"];
        $success = $user->unban($username);
        if($success){
            echo "OK";
        }else{
            echo "FAIL";
        }
    }