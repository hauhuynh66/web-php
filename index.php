<?php
    /*header('Location:./template/');
    $request = $_SERVER["REQUEST_URI"];
    var_dump($request);*/
    set_include_path("H:/Projects/PHP/assignment/");
    include_once("config/lang.php");
    require_once("model/user.php");
    require_once("model/template.php");
    require_once("model/review.php");
    require_once("controller/Controller.php");
    session_start();
    $url = isset($_SERVER['PATH_INFO'])? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';
    $uri = $_SERVER["REQUEST_URI"];
    $reqtype = $_SERVER["REQUEST_METHOD"];

    $controller = new Controller($user,$template,$review);
    if($url[0]=="/"){
        if(!isset($_SESSION["username"])){
            header("Location:/assignment/login");
        }else{
            $controller->get($url[0]);
        }
    }
    if($url[0]=="login"&&$reqtype=="GET"){
        $controller->get($url[0]);
    }
    if($url[0]=="authenticate"&&$reqtype=="POST"){
        $controller->post($url[0]);
    }
    if($url[0]=="logout"&&$reqtype=="GET"){
        $controller->get($url[0]);
    }
    if($url[0]=="users"&&$reqtype=="GET"){
        $controller->get($url[0]);
    }
    if($url[0]=="powerpoint"&&isset($url[1])&&$reqtype=="GET"){
        $controller->get($url[0],$url[1]);
    }
    if($url[0]=="web"&&isset($url[1])&&$reqtype=="GET"){
        $controller->get($url[0],$url[1]);
    }
    if($url[0]=="upload"&&!isset($url[1])&&$reqtype=="GET"){
        $controller->get($url[0],"index");
    }
    if($url[0]=="about"&&$reqtype=="GET"){
        $controller->get($url[0]);
    }
    if($url[0]=="profile"&&!isset($url[1])&&$reqtype=="GET"){
        $controller->get($url[0],"index");
    }else if($url[0]=="profile"&&$url[1]=="update"&&$reqtype=="POST"){
        $controller->post($url[0],$url[1]);
    }else if($url[0]=="profile"&&$url[1]=="get"&&isset($url[2])&&$reqtype=="GET"){
        $controller->get($url,$url[2]);
    }
    if($url[0]=="404"&&$reqtype=="GET"){
        $controller->get($url[0]);
    }
    if($url[0]=="403"&&$reqtype=="GET"){
        $controller->get($url[0]);
    }
    if($url[0]=="lang"&&$reqtype=="POST"){
        $controller->post($url[0],$url[1]);
    }
    if($url[0]=="api_call"&&$reqtype=="POST"){
        $controller->post($url[0],$url[1]);
    }
    if($url[0]=="download"&&$reqtype=="GET"){
        echo $reqtype;
        $controller->get($url[0],$url[1]);
    }
    if($url[0]=="web-preview"&&$reqtype=="GET"){
        $controller->get($url[0],$url[1]);
    }
    if($url[0]=="ppt-preview"&&$reqtype=="GET"){
        $controller->get($url[0],$url[1]);
    }
    if($url[0]=="review"&&$url[1]=="add"){
        $controller->get($url[0]."/".$url[1]);
    }
    if($url[0]=="template"&&$url[1]=="upload"&&$reqtype=="POST"){
        $controller->post($url[0],$url[1]);
    }
    if($url[0]=="list"&&$reqtype=="GET"){
        $controller->get($url[0],$url[1]);
    }
    if($url[0]=="template"&&$url[1]=="edit"&&$reqtype=="POST"){
        $controller->post($url,$url[2]);
    }
    if($url[0]=="template"&&$url[1]=="info"&&$reqtype=="GET"){
        $controller->get($url,$url[2]);
    }
    if($url[0]=="search"&&$reqtype=="GET"){
        $controller->get($url,$url[1]);
    }
    if($url[0]=="templates"&&$reqtype=="GET"){
        $controller->get($url[0]);
    }
    if($url[0]=="register"&&!isset($url[1])&&$reqtype=="GET"){
        $controller->get($url[0]);
    }else if($url[0]=="register"&&$url[1]=="add"&&$reqtype=="POST"){
        $controller->post($url);
    }
    if($url[0]=="delete"&&$url[1]=="template"&&$reqtype=="POST"){
        $controller->post($url,$url[2]);
    }
    if($url[0]=="password"&&!isset($url[1])&&$reqtype=="GET"){
        $controller->get($url[0]);
    }else if($url[0]=="password"&&$url[1]=="change"){
        $controller->get($url);
    }