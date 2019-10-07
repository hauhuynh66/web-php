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
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-indigo">
            <div class="sidebar-brand">
                <h4 class="brand-img pt-4">Site Brand</h4>
            </div>

            <div class="container item-holder pb-0 border-bottom-0">
                <div class="sidebar-item">
                    <a href="index.php" class="normal-text pt-2">Dashboard</a>
                </div>
                <div class="item"></div>
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
        <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content">
            <?php
                include("fragment/topbar.php");
            ?>
            <div class="main-content pr-2">
                <h3>What is Lorem Ipsum?</h3>
                <hr>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <hr>
                <h3>Why do we use it?</h3>
                <hr>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
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