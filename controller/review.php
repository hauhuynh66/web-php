<?php
    require_once("../model/review.php");
    $review = new review($conn);
    if(isset($_POST["post"])){
        session_start();
        $template_name = $_POST["template"];
        $username = $_SESSION["username"];
        $star = $_POST["rating"];
        $content = $_POST["comment"];
        $success = $review->insert($template_name,$username,$star,$content);
        if($success){
            if($_POST["type"]=="Web"){
                header("Location:../template/web-preview.php?name=".$_POST["template"]);
            }else{
                header("Location:../template/powerpoint-preview.php?name=".$_POST["template"]);
            }
        }else{
            echo "a";
        }
    }