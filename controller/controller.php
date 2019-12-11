<?php
    require_once("../model/user.php");
    $call = $_POST["function"];
    function validate_info($fname,$lname,$username,$email){
        $error = "NONE";
        if(strlen($fname)<3){
            $error = "First name must have more than 4 character";
        }else if(strlen($lname)<3){
            $error = "Last name must have more than 4 character";
        }else if(strlen($username)<6){
            $error = "Username must have more than 6 character";
        }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error = "Email not valid";
        }
        return $error;
    }
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
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
    }else if($call=="update_password"){
        $username = $_SESSION["username"];
        $op = $_POST["op"];
        $np = $_POST["np"];
        $exist = $user->get_by_username($username);
        $u = $exist->fetch_assoc();
        if($u!=null){
            if(password_verify($op,$u["password"])){
                if(strlen($np)<8){
                    echo "FAILED";
                }else{
                    $success = $user->change_password($username,$np);
                    if($success){
                        echo "SUCCESS";
                    }else{
                        echo "FAILED";
                    }
                }
            }else{
                echo "WRONG PASSWORD";
            }
        }else{
            echo "NOT FOUND";
        }
    }else if($call="update_info"){
        $exist = $user->get_by_username($_SESSION["username"])->fetch_assoc();
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        if($exist!=null){
            $id = $exist["id"];
            $error = validate_info($fname,$lname,$username,$email);
            if($error=="NONE"){
                $success = $user->update_information($id,$fname,$lname,$username,$email);
                if($success){
                    $_SESSION["username"] = $username;
                    echo "SUCCESS";
                }else{
                    echo "FAILED";
                }
            }else{
                echo $error;
            }
        }else{
            echo "NOT FOUND";
        }
    }