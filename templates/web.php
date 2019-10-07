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
    <div class="row text-center">
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-green" id="sidebar">
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