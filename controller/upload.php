<?php
    require_once("../model/template.php");
    require_once("../model/user.php");
    if(isset($_POST["post"])){
        $f = $_FILES["file"]["tmp_name"];
        $n = sizeof($_FILES["image"]["name"]);
        if(isset($_POST["name"])&&$_POST["name"]){
            $name = $_POST["name"];
        }else{
            die();
        }
        if(strlen($name)<6||strlen($name)>200){
            echo "n";
            die();
        }
        $type = strtolower($_POST["type"]);
        $src_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/file/".$type."/".$name;
        if(!is_dir($src_path)){
            mkdir($src_path);
        }
        $des = $src_path."/src.zip";
        move_uploaded_file($f,$des);
    }