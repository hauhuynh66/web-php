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
        $remain = 5 - $star;
        echo("<div class='row mt-2'>");
        echo("<div class='col-3'>
                <span><i class='fa fa-user mr-2'></i><span>$user</span></span>
            </div>
            <div class='col-6 text-center'>
                <p>\" $comment \"</p>
            </div>
            <div class='col-3'>
        ");
        for($i=0;$i<$star;$i++){
            echo("<span><i class='fas fa-star icon-yellow'></i></span>");
        }
        for($i=0;$i<$remain;$i++){
            echo("<span><i class='fas fa-star'></i></span>");
        }
        echo("</div></div>");
    }

    function insert_review($conn,$template_name,$username,$star,$content){
        $table = "review";
        $sql = "insert into $table(template,username,star,content) values ('$template_name','$username',$star,'$content')";
        return mysqli_query($conn,$sql);
    }

    if(isset($_POST["post"])){
        session_start();
        $template_name = $_POST["template"];
        $username = $_SESSION["username"];
        $star = $_POST["rating"];
        $content = $_POST["comment"];
        $success = insert_review($conn,$template_name,$username,$star,$content);
        if($_POST["type"]=="Web"){
            header("Location:../template/web-preview.php?name=".$_POST["template"]);
        }else{
            header("Location:../template/powerpoint-preview.php?name=".$_POST["template"]);
        }
    }