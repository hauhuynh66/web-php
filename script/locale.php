<?php
    if(!isset($_COOKIE['locale'])){
        $locale = "en";
    }else{
        $locale = $_COOKIE['locale'];
    }
    if($locale=="en"){
        $string = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/assignment/script/lang/en.json");
        $lang = json_decode($string);
        var_dump($lang->{"vn"});
    }

