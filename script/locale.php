<?php
    if(isset($_POST["locale"])){
        setcookie("locale",$_POST["locale"],time()+3600*24*30,"/");
        echo("OK");
        die();
    }
    if(!isset($_COOKIE['locale'])){
        $locale = "fr";
    }else{
        $locale = $_COOKIE['locale'];
    }
    switch ($locale){
        case "en":
            $string = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/assignment/script/lang/en.json");
            break;
        case "vn":
            $string = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/assignment/script/lang/vn.json");
            break;
        case "fr":
            $string = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/assignment/script/lang/fr.json");
            break;
        default:
            break;
    }
    $lang = json_decode($string);