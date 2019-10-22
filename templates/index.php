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
            <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-info" id="sidebar">
                <?php
                    include("fragment/sidebar.php");
                ?>
            </div>
            <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
                <?php
                    include("fragment/topbar.php");
                ?>
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
                                                include("../script/template-query.php");
                                                echo(mysqli_num_rows(get_all_templates($conn)));
                                            ?>
                                        </div>
                                        <div class="col-auto my-auto">
                                            <i class="fa fa-bars fa-2x icon-orange"></i>
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
                                                echo(get_total_downloads(get_all_templates($conn)));
                                            ?>
                                        </div>
                                        <div class="col-auto my-auto">
                                            <i class="fa fa-download fa-2x icon-info"></i>
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
                                                include("../script/user-query.php");
                                                echo(mysqli_num_rows(get_all_users($conn)));
                                            ?>
                                        </div>
                                        <div class="col-auto my-auto">
                                            <i class="fa fa-users fa-2x icon-black"></i>
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
                    include_once("fragment/footer.php");
                ?>
            </div>
        </div>
    </div>
<script src="../vendor/jquery/jquery-3.4.1.js"></script>
<script src="../vendor/bootstrap/bootstrap.js"></script>
<script src="../vendor/chartjs/chart.js"></script>
<script src="../vendor/font-awesome/js/fontawesome.js"></script>
<script src="../js/main.js"></script>
<script src="../js/dashboard.js"></script>
</body>
</html>