<?php
    include("script/template-query.php");
    if(isset($_GET["template_name"])){
        header("Location:../templates/404.php");
    }else{
        $template_name = $_GET["template_name"];
        $result = get_template_by_name($conn,$template_name);
        if($result==null){
            header("Location:../templates/404.php");
        }
        $path = $result->fetch_assoc()["path"]."/src/src.zip";
        $file_url = 'http://localhost/assignment'.$path;
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
        echo readfile($file_url);
    }