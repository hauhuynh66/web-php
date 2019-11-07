<?php
    include("script/template-query.php");
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location:../template/login.php");
    }
    if(!isset($_GET["template_name"])){
        header("Location:../template/404.php");
    }else{
        $template_name = $_GET["template_name"];
        var_dump($template_name);
        $result = get_template_by_name($conn,$template_name);
        if($result==null){
            header("Location:../template/404.php");
        }
        $path = "{$_SERVER['DOCUMENT_ROOT']}/assignment/file".$result->fetch_assoc()["path"]."/src.zip";
        header( 'Cache-Control: public' );
        header( 'Content-Description: File Transfer' );
        header( "Content-Disposition: attachment;" );
        header( 'Content-Type: application/zip' );
        header( 'Content-Transfer-Encoding: binary' );
        //var_dump($path);
        readfile($path);
        exit();
    }