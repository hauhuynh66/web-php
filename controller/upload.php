<?php
    require_once("../model/template.php");
    require_once("../model/user.php");
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $template = new template($conn);
    if(isset($_POST["post"])){
        $f = $_FILES["file"]["tmp_name"];
        $n = sizeof($_FILES["image"]["name"]);
        if(isset($_POST["name"])&&$_POST["name"]){
            $name = $_POST["name"];
            if(strlen($name)<6||strlen($name)>200){
                header("Location:/assignment/template/upload.php?error=name");
            }
        }else{
            header("Location:/assignment/template/upload.php?error=name");
        }
        $type = strtolower($_POST["type"]);
        $exist = $template->get_by_name($name);
        if($exist->fetch_assoc()!=null){
            header("Location:/assignment/template/upload.php?error=existed");
        }
        $des = $_POST["description"];
        $uploader = $_SESSION["username"];
        $success = $template->upload($name,$type,$uploader,$des);
        if(!$success){
            header("Location:/assignment/template/upload.php?failed");
        }
        $src_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/file/".$type."/".$name;
        $img_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/image/preview/".$type."/".$name;
        if(!is_dir($src_path)){
            mkdir($src_path);
        }
        if(!is_dir($img_path)){
            mkdir($img_path);
        }
        for($i=0;$i<$n;$i++){
            $j = $i+1;
            $ext = pathinfo($_FILES["image"]["name"][$i],PATHINFO_EXTENSION);
            $img = $_FILES["image"]["tmp_name"][$i];
            $img_des = $img_path."/img".$j.".".$ext;
            move_uploaded_file($img,$img_des);
        }
        $src_des = $src_path."/src.zip";
        move_uploaded_file($f,$src_des);
        header("Location:/assignment/template/upload.php?success");
    }