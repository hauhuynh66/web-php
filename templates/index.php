<?php
    include_once("../script/locale.php");
    include_once("../script/template-query.php");
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
                <div class="main-content my-4 ml-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="../image/cover/welcome.jpg" alt="First slide" height="600">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h4 class="text-info carousel-text">Welcome To Templates<sup>TM</sup></h4>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="../image/cover/ppt.jpg" alt="Second slide" height="600">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h4 class="text-dark carousel-text">We Provide Powerpoint Templates</h4>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="../image/cover/web.jpg" alt="Third slide" height="600">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h4 class="text-dark carousel-text">And Web Templates For Free</h4>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="../image/cover/img.jpg" alt="Fourth slide" height="600">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h4 class="text-warning carousel-text">Sign Up Now To Download And Upload</h4>
                                                </div>
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
                    <hr>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-mb-6 col-sm-6 pt-2">
                            <div class="card shadow bordered">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <p class="text-dark">Templates</p>
                                            <?php
                                                echo(mysqli_num_rows(get_all_templates($conn)));
                                            ?>
                                        </div>
                                        <div class="col-3 justify-content-end pt-3">
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
                                        <div class="col-9">
                                            <p class="text-dark">Downloads</p>
                                            <?php
                                                echo(get_total_downloads(get_all_templates($conn)));
                                            ?>
                                        </div>
                                        <div class="col-3 justify-content-end pt-3">
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
                                        <div class="col-9">
                                            <p class="text-dark">Users</p>
                                            <?php
                                                echo(mysqli_num_rows(get_all_users($conn)));
                                            ?>
                                        </div>
                                        <div class="col-3 justify-content-end pt-3">
                                            <i class="fa fa-users fa-2x icon-black"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="container text-center">

                            <div class="container">
                                <h3 class="text-left">Design and Build Beautiful Websites!</h3>
                                <hr>
                                <i class="fab fa-html5 fa-2x pl-3 icon-orange"></i>
                                <i class="fab fa-css3-alt fa-2x pl-3 icon-info"></i>
                                <i class="fab fa-js-square fa-2x pl-3 icon-yellow"></i>
                                <p class="text-left">Trying to choose a website builder template from the thousands of options available is like being taken to a buffet,
                                    then being told you can only pick one item to eat. <br>
                                    It’s hard to figure out which template is best for your specific goals. If you’re a creative,
                                    you’ll want a template that beautifully emphasizes visual work. If you’re looking to sell online,
                                    you’ll want a layout with an easy-to-navigate digital store. If you’re a local business,
                                    you’ll want to create a user experience that encourages potential customers to visit in person…
                                    the list goes on. <br>
                                    Our team has tested and researched the best website builder templates extensively,
                                    creating sites that cater to all of our different interests.  </p>
                            </div>
                            <hr>
                            <div class="container">
                                <h3 class="text-left">Powerpoint Templates that Will Definitely Wow Your Audience! </h3>
                                <hr>
                                <i class="fas fa-file-powerpoint fa-2x pl-3 icon-danger"></i>
                                <p class="text-left">PowerPoint templates can make your presentation a way better. Discover how exactly.
                                    Get all the necessary information on the PowerPoint templates that you may want to know.
                                    Are you looking for stunning powerpoint templates that will make your powerpoint presentation stand out?
                                    Do you want to get the most out of your ppt presentation? Do you want to make the best possible
                                    impression on your audience? Excellent! You've come to the right spot! <br>
                                    In fact, nowadays power point presentations are widely used by students, marketers, analysts, project managers, etc.
                                    They can serve you as a very effective tool of drawing and keeping the attention of your audience while conveying your ideas.</p>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <h4>Statistics</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-mb-6 col-lg-6 col-xl-6 mt-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4>Stat 1</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chart1" height="200px"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-mb-6 col-lg-6 col-xl-6 mt-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4>Stat 2</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chart2" height="200px"></canvas>
                                </div>
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