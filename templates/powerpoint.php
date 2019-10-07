<?php
    include("../script/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="#" />
    <link href="../vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content shadow ml-2">
    <div class="row">
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-danger" id="sidebar">
            <div class="sidebar-brand">
                <h4 class="brand-img pt-4" id="side-brand">Site Brand</h4>
            </div>
            <div class="container item-holder">
                <div class="sidebar-item">
                    <a href="index.php" class="normal-text pt-2">Dashboard</a>
                </div>
            </div>
            <div class="container item-holder">
                <div class="sidebar-item">
                    <a href="powerpoint.php" class="normal-text pt-2">PowerPoint</a>
                </div>
            </div>
            <div class="container item-holder">
                <div class="sidebar-item">
                    <a href="web.php" class="normal-text pt-2">Web</a>
                </div>
            </div>
            <div class="container item-holder">
                <div class="sidebar-item">
                    <a href="contribute.php" class="normal-text pt-2">Contribute</a>
                </div>
            </div>
            <div class="container">
                <div class="sidebar-item">
                    <a href="about.php" class="normal-text pt-2">About</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
            <?php
                include("fragment/topbar.php");
            ?>
            <div class="main-content pr-2">
                <hr>
                <h5>Categories</h5>
                <hr>
                <div class="row">
                    <div class=""></div>
                </div>
                <hr>
                <h5>Most Downloaded</h5>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="image-holder">

                                </div>
                                <div class="description">

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success">
                                    <a class="item" href="powerpoint-preview.php"><i class="fas fa-eye pr-1"></i>Preview</a>
                                </button>
                                <button class="btn btn-success float-right">
                                    <a class="item" href="#"><i class="fas fa-download pr-1"></i>Download</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="image-holder">

                                </div>
                                <div class="description">

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success">
                                    <a class="item" href="powerpoint-preview.php"><i class="fas fa-eye pr-1"></i>Preview</a>
                                </button>
                                <button class="btn btn-success float-right">
                                    <a class="item" href="#"><i class="fas fa-download pr-1"></i>Download</a>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-info float-right my-3 mr-2">
                            <a class="item" href="powerpoint-files.php"><i class="fas fa-bars pr-1"></i>More</a>
                        </button>
                    </div>
                </div>
                <hr>
                <h5>New Uploads</h5>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="image-holder">

                                </div>
                                <div class="description">

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success">
                                    <a class="item" href="powerpoint-preview.php"><i class="fas fa-eye pr-1"></i>Preview</a>
                                </button>
                                <button class="btn btn-success float-right">
                                    <a class="item" href="#"><i class="fas fa-download pr-1"></i>Download</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="image-holder">

                                </div>
                                <div class="description">

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success">
                                    <a class="item" href="powerpoint-preview.php"><i class="fas fa-eye pr-1"></i>Preview</a>
                                </button>
                                <button class="btn btn-success float-right">
                                    <a class="item" href="#"><i class="fas fa-download pr-1"></i>Download</a>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-info float-right my-3 mr-2">
                            <a class="item" href="powerpoint-preview.php"><i class="fas fa-bars pr-1"></i>More</a>
                        </button>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-6"></div>
                    <div class="col-6">
                    </div>
                </div>
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