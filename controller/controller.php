<?php
    require_once("../model/user.php");
    $user = new user($conn);
    $id = $_POST["i"];
    $username = $_POST["un"];
    $success = $user->update_image($username,$id);
    if($success){
        echo "Ok";
    }else{
        echo "Fail";
    }