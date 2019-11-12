<?php
    require_once("../controller/session.php");
    require_once("../model/template.php");
    if(!isset($_GET["uploader"])){
        header("Location:404.php");
    }
    $uploader = $_GET["uploader"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List</title>
    <link rel="shortcut icon" href="#" />
    <link href="../static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../static/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content shadow ml-2">
    <div class="row">
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-info" id="sidebar">
            <?php
            include("fragment/sidebar.php");
            ?>
        </div>
        <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
            <?php
            include("fragment/topbar.php");
            ?>
            <div class="main-content m-4">
                <?php
                    include("fragment/filter.php");
                    $i = 0;
                    $teplate = new template($conn);
                    $templates = $teplate->get_by_uploader($uploader);
                    echo ("<h4 class=\"text-info\">Templates upload by $uploader</h4>");
                    echo("<div class='row'>");
                    while ($t = $templates->fetch_assoc()){
                        if($t["type"]=="powerpoint"){
                            $teplate->render_ppt($t,$i);
                        }else{
                            $teplate->render_web($t,$i);
                        }
                        $i++;
                    }
                    echo("</div>");
                ?>
            </div>
            <?php
                include("fragment/modals.php");
                include("fragment/footer.php");
            ?>
        </div>
    </div>
</div>
</body>
<script src="../static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="../static/vendor/bootstrap/bootstrap.js"></script>
<script src="../static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="../static/js/main.js"></script>
<script src="../static/js/download.js"></script>
</html>