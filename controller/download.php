<?php
    require_once("../model/template.php");
    session_start();
    $template = new template($conn);
    if(!isset($_SESSION["username"])){
        header("Location:../template/login.php");
    }
    if(!isset($_GET["template"])){
        header("Location:../template/404.php");
    }else{
        $template_name = $_GET["template"];
        $result = $template->get_by_name($template_name)->fetch_assoc();
        if($result==null){
            header("Location:../template/404.php");
        }
        $template->download($template_name);
        $name = $result["name"];
        $type = $result["type"];
        $path = $_SERVER['DOCUMENT_ROOT']."/assignment/file/".$type."/".$name."/src.zip";
        header( 'Cache-Control: public' );
        header( 'Content-Description: File Transfer' );
        header( "Content-Disposition: attachment;" );
        header( 'Content-Type: application/zip' );
        header( 'Content-Transfer-Encoding: binary' );
        readfile($path);
        exit();
    }