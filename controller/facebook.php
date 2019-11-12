<?php
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    use Facebook\Facebook;
    require("../vendor/autoload.php");
    $fb = new Facebook([
        "app_id"=>"3195907820451281",
        "app_secret"=>"{app_secret}",
        "default_graph_version"=>"v3.2"
    ]);

    $helper = $fb->getRedirectLoginHelper();
    $loginUrl = $helper->getLoginUrl("http://localhost/assignment/controller/callback.php");
    header("Location:".htmlspecialchars($loginUrl));