<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="#" />
    <link href="vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="content shadow ml-2">
        <div class="row text-center">
            <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-info" id="sidebar">
                <div class="sidebar-brand">
                    <h4 class="brand-img pt-4" id="side-brand">Site Brand</h4>
                </div>
                <div class="container item-holder pb-0 border-bottom-0">
                    <div class="sidebar-item">
                        <a href="index.php" class="normal-text pt-2">Dashboard</a>
                    </div>
                    <div class="item"></div>
                </div>
                <div class="container item-holder border-bottom-0">
                    <div class="sidebar-item">
                        <a href="./templates/powerpoint.html" class="normal-text pt-2">PowerPoint</a>
                    </div>
                </div>
                <div class="container item-holder">
                    <div class="sidebar-item">
                        <a href="./templates/web.html" class="normal-text pt-2">Web</a>
                    </div>
                </div>
                <div class="container item-holder">
                    <div class="sidebar-item">
                        <a href="./templates/contribute.html" class="normal-text pt-2">Contribute</a>
                    </div>
                </div>
                <div class="container">
                    <div class="sidebar-item">
                        <a href="templates/about.html" class="normal-text pt-2">About</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
                <div class="navbar navbar-expand navbar-dark shadow bg-white">
                    <div class="w-haft">
                        <button class="btn" id="menu-collapse">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="vr"></div>
                        <button class="btn btn-info round">
                            <i class="fab fa-github icon-black"></i>
                        </button>
                        <div class="vr"></div>
                        <button class="btn btn-danger round">
                            <i class="fab fa-facebook icon-black"></i>
                        </button>
                        <div class="vr"></div>
                        <button class="btn btn-success round">
                            <i class="fab fa-twitter icon-black"></i>
                        </button>
                    </div>
                    <div class="input-group w-haft">
                        <input class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-info">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="main-content pr-2">
                    <h5>Dashboard</h5>
                    <hr>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-mb-6 col-sm-6 pt-2">
                            <div class="card shadow bordered">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <p class="text-dark">Templates</p>
                                            <?php
                                                include("script/templates.php");
                                            ?>
                                        </div>
                                        <div class="col-auto my-auto">
                                            <i class="fa fa-bars fa-2x icon-grey"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-mb-6 col-sm-6 pt-2">
                            <div class="card shadow bordered">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <p class="text-dark">Downloads</p>
                                            <?php
                                                include("script/downloads.php");
                                            ?>
                                        </div>
                                        <div class="col-auto my-auto">
                                            <i class="fa fa-download fa-2x icon-grey"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-mb-6 col-sm-6 pt-2">
                            <div class="card shadow bordered">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <p class="text-dark">Users</p>
                                            <?php
                                                include("script/user.php");
                                            ?>
                                        </div>
                                        <div class="col-auto my-auto">
                                            <i class="fa fa-ice-cream fa-2x icon-grey"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row pt-2">
                        <div class="container text-center">
                            <div class="container pb-2">
                                <i class="fab fa-html5 fa-3x pl-3 icon-orange"></i>
                                <i class="fab fa-css3-alt fa-3x pl-3 icon-blue"></i>
                                <i class="fab fa-js-square fa-3x pl-3 icon-yellow"></i>
                                <i class="fas fa-file-powerpoint fa-3x pl-3 icon-red"></i>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-mb-6 col-lg-6 col-xl-6">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4>Stat</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chart1" height="200px"></canvas>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-mb-6 col-lg-6 col-xl-6">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4>Stat</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chart2" height="200px"></canvas>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    include_once("templates/fragment/footer.php");
                ?>
            </div>
        </div>
    </div>
<script src="vendor/jquery/jquery-3.4.1.js"></script>
<script src="vendor/bootstrap/bootstrap.js"></script>
<script src="vendor/chartjs/chart.js"></script>
<script src="vendor/font-awesome/js/fontawesome.js"></script>
<script src="js/main.js"></script>
<script src="js/dashboard.js"></script>
</body>
</html>