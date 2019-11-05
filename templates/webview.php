<?php
    include_once("../script/template-query.php");
    if(!isset($_GET["name"])){
        header("Location:../templates/404.php");
    }else{
        $template = get_template_by_name($conn,$_GET["name"])->fetch_assoc();
        if($template==null){
            header("Location:../templates/404.php");
        }else{
            header("Location:/preview");
        }
    }