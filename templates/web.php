<?php
    include("../script/session.php");
    include("../script/template-query.php");
    $page = $_GET["page"];
    $limit = $page*15;
    $offset = ($page-1)*15;
    if(!isset($_GET["filter"])){
        $mode = "dls";
    }else{
        $mode = $_GET["filter"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web</title>
    <link rel="shortcut icon" href="#" />
    <link href="../vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content shadow ml-2">
    <div class="row">
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-green" id="sidebar">
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
                    $result = get_template_by_type_with_limit($conn,"web",$limit,$offset, $mode);
                    echo("<div class='row'>");
                    while($row = $result->fetch_assoc()){
                        display_web($row);
                    }
                    echo("</div>");
                    if(mysqli_num_rows($result)>15){
                        echo "<div class='row pt-3'>
                                    <div class='col-11'></div>
                                    <div class='col-1'>
                                        <button class='btn btn-info btn-block'>
                                            <i class='fa fa-arrow-right'></i>
                                        </button>
                                    </div>
                                </div>";
                    }
                ?>
            </div>
            <?php
                echo("<div class='container text-center'><p id='page'>$page</p></div>");
                include("fragment/modals.php");
                include("fragment/footer.php");
            ?>
        </div>
    </div>
</div>
<script src="../vendor/jquery/jquery-3.4.1.js"></script>
<script src="../vendor/bootstrap/bootstrap.js"></script>
<script src="../vendor/font-awesome/js/fontawesome.js"></script>
<script src="../js/main.js"></script>
<script src="../js/download.js"></script>
</body>
</html>