<?php
    function generate_string($n){
        $string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        return substr(str_shuffle($string),0,$n);
    }

    function count_file($absolute_path,$exts){
        $count = 0;
        for($i=0;$i<sizeof($exts);$i++){
            $file = glob($absolute_path.$exts[$i],GLOB_BRACE);
            if($file){
                $count += count($file);
            }
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