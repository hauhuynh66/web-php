<?php
    require_once("../model/user.php");
    $call = $_POST["function"];
    if($call=="image_update"){
        $id = $_POST["i"];
        $username = $_POST["un"];
        $success = $user->update_image($username,$id);
        if($success){
            echo "Ok";
        }else{
            echo "Fail";
        }
    }else if($call=="block"){
        $username = $_POST["username"];
        $success = $user->block($username);
        if($success){
            echo "Ok";
        }else{
            echo "Fail";
        }
    }