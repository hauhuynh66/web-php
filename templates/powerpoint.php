<?php
    include("../script/session.php");
    include("../script/template-query.php");
    $page = $_GET["page"];
    $limit = $page*15;
    $offset = ($page-1)*15;
    if(isset($_GET["filter"])){
        $mode = $_GET["filter"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Powerpoint</title>
    <link rel="shortcut icon" href="#" />
    <link href="../vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
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
            <div class="main-content pr-2">
                <?php
                    include("fragment/filter.php");
                    $result = get_template_by_type_with_limit($conn,"powerpoint",$limit,$offset);
                    echo("<div class='row'>");
                    while($row = $result->fetch_assoc()){
                        $name = $row["title"];
                        $description = $row["description"];
                        display($name,$description);
                    }
                    echo("</div>");
                    if(mysqli_num_rows($result)>15){
                        echo "<div class='row pt-3'>
                                    <div class='col-11'></div>
                                    <div class='col-1'>
                                        <button class='btn btn-info btn-block'>
                                            <i class=\'fa fa-arrow-right'></i>
                                        </button>
                                    </div>
                                </div>";
                    }
                    if(mysqli_num_rows($result)==0){
                        echo "<div class='row pt-5'>
                            <div class='col-12 text-center'><h5>Nothing here</div>
                        </div>";
                    }
                ?>
            </div>
            <?php
                include("fragment/footer.php");
            ?>
        </div>
    </div>
</div>

<script src="../vendor/jquery/jquery-3.4.1.js"></script>
<script src="../vendor/bootstrap/bootstrap.js"></script>
<script src="../vendor/font-awesome/js/fontawesome.js"></script>
<script src="../js/main.js"></script>
</body>
</html>