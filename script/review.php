<?php
    include_once("../script/db.php");
    function get_all_review($conn,$template){
        $table = "review";
        $sql = "select * from $table where template='$template'";
        return mysqli_query($conn,$sql);
    }

    function display_review($review){
        $user = $review["username"];
        $comment = $review["content"];
        $star = $review["star"];
        echo("<div class='row mt-2'>
            <div class='col-3'>
                <span><i class='fa fa-user mr-2'></i><span>$user</span></span>
            </div>
            <div class='col-6'>
                <p>$comment</p>
            </div>
            <div class='col-3'>
                <p>$star</p>
            </div>
        </div>");
    }
    if(isset($_POST["post"])){
        session_start();
        $table = "review";
        $template = $_POST["template"];
        $username = $_SESSION["username"];
        $star = 4;
        $content = $_POST["comment"];
        $sql = "insert into $table(template,username,star,content) values ('$template','$username',$star,'$content')";
        $success = mysqli_query($conn,$sql);
        var_dump($success);
        if($_POST["type"]=="Web"){
            header("Location:../templates/web-preview.php?name=".$_POST["template"]);
        }else{
            header("Location:../templates/powerpoint-preview.php?name=".$_POST["template"]);
        }
    }