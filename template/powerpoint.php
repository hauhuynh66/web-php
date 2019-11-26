<?php
    include("../controller/session.php");
    include("../model/template.php");
    $page = $_GET["page"];
    $n = 10;
    $limit = $page*$n;
    $offset = ($page-1)*$n;
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
    <title>Powerpoint</title>
    <link rel="shortcut icon" href="#" />
    <link href="../static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../static/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content shadow ml-2">
    <div class="row">
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-danger" id="sidebar">
            <?php
                include("fragment/sidebar.php");
            ?>
        </div>
        <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
            <?php
                include("fragment/topbar.php");
            ?>
            <div class="main-content my-4 ml-4">
                <?php
                    include_once("fragment/filter.php");
                    filter("ppt",$mode);
                    $i = 0;
                    $r = mysqli_num_rows($template->get_by_type("powerpoint"));
                    $result = $template->get("powerpoint",$limit,$offset,$mode);
                    echo("<div class='row'>");
                    while($row = $result->fetch_assoc()){
                        $template->render_ppt($row,$i);
                        $i++;
                    }
                    echo("</div>");
                    echo "<div class='row pt-3'>";
                    if($page>1){
                        $prev = $page-1;
                        echo "<div class='col-1'><a class='btn btn-info' href='powerpoint.php?page=$prev&filter=$mode'><i class='fa fa-arrow-left icon-white'></i></a></div>";
                    }else{
                        echo "<div class='col-1'><a></a></div>";
                    }
                    if($r-($limit+$offset)>0){
                        $next = $page+1;
                        echo "<div class='col-10'></div>";
                        echo "<div class='col-1'>
                                    <a class='btn btn-info' href='powerpoint.php?page=$next&filter=$mode'>
                                        <i class='fa fa-arrow-right icon-white'></i>
                                    </a>
                            </div>";
                    }
                    echo "</div>";
                    if(mysqli_num_rows($result)==0){
                        echo "<div class='row pt-5'>
                                    <div class='col-12 text-center'><h5>Nothing here</div>
                                </div>";
                    }
                ?>
            </div>
            <?php
                echo("<div class='container text-center'><p id='page' hidden>$page</p></div>");
                include("fragment/modals.php");
                include("fragment/footer.php");
            ?>
        </div>
    </div>
</div>
<script src="../static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="../static/vendor/bootstrap/bootstrap.js"></script>
<script src="../static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="../static/js/main.js"></script>
<script src="../static/js/download.js"></script>
</body>
</html>