<?php
    function generate_string($n){
        $string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        return substr(str_shuffle($string),0,$n);
    }

    function count_file($absolute_path,$postfix="*.jpg"){
        $file = glob($absolute_path.$postfix,GLOB_BRACE);
        $count = 0;
        if($file){
            $count = count($file);
        }
        return $count;
    }

    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }