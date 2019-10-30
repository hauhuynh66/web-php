<?php
    include("script/template-query.php");
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location:../templates/login.php");
    }
    if(!isset($_GET["template_name"])){
        header("Location:../templates/404.php");
    }else{
        $template_name = $_GET["template_name"];
        $result = get_template_by_name($conn,$template_name);
        if($result==null){
            header("Location:../templates/404.php");
        }
        $path = $result->fetch_assoc()["path"]."/src.zip";
        header("Location: /assignment"."$path");
    }