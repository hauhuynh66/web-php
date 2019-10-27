<?php
    include("../script/session.php");
    include("../script/get_template.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preview</title>
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
                    $name = $_GET["name"];
                    $result = get_powerpoint_template($conn,$name);
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="../image/bg-1.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="../image/bg-2.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="../image/bg-3.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-xl-4 col-lg-4 col-mb-4 col-sm-12">
                        <h5>Properties</h5>
                        <hr>
                        <?php
                            $downloads = $result["downloads"];
                            $des = $result["description"];
                            $path = $result["path"];
                            $uploader = $result["uploader"];
                            echo("<p>Upload by : <a href='#'>$uploader</a></p>");
                            echo("<p>Download : $downloads</p>
                                    <div class='row'>
                                        <div class='col-6'>
                                            <button class='btn btn-block btn-info' data-toggle='modal' data-target='#download-modal'>Download</button>
                                        </div>
                                    </div>");
                        ?>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-mb-8 col-sm-12">
                        <h5>Description</h5>
                        <hr>
                        <?php
                            echo("<p>$des</p>");
                        ?>
                    </div>
                </div>
            </div>
            <?php
                include("fragment/footer.php");
                include("fragment/modals.php");
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