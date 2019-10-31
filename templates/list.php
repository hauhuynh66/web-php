<?php
    include("../script/session.php");
    include_once("../script/template-query.php");
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
    <link href="../vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
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
                    $templates = get_all_templates_by_uploader($conn,$uploader);
                    echo ("<h4 class=\"text-info\">Templates upload by $uploader</h4>");
                    echo("<div class='row'>");
                    while ($t = $templates->fetch_assoc()){
                        if($t["type"]=="powerpoint"){
                            display_ppt($t);
                        }else{
                            display_web($t);
                        }
                    }
                    echo("</div>");
                ?>
            </div>
            <?php
                include("fragment/footer.php");
            ?>
        </div>
    </div>
</div>
</body>
<script src="../vendor/jquery/jquery-3.4.1.js"></script>
<script src="../vendor/bootstrap/bootstrap.js"></script>
<script src="../vendor/font-awesome/js/fontawesome.js"></script>
<script src="../js/main.js"></script>
</html>