<?php
    require_once("../model/template.php");
    require_once("../model/user.php");
    $call = $_POST["call"];
    if($call=="1"){
        $w = $template->get_by_type("web")->num_rows;
        $p = $template->get_by_type("powerpoint")->num_rows;
        $arr = array("Web"=>$w,"Powerpoint"=>$p);
        echo json_encode($arr);
    }
    if($call=="2"){
        $arr = array();
        for ($i=6;$i>=0;$i--){
            $v = date("Y:m:d",time()-$i*24*3600);
            $n = $user->get_by_date($v)->num_rows;
            $arr[$v] = $n;
        }
        echo json_encode($arr);
    }