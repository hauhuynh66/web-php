<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Not Found</title>
    <link rel="shortcut icon" href="#" />
    <link href="/assignment/static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/css/main.css" rel="stylesheet" type="text/css">
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
            <div class="main-content m-5">
                <div class="container text-center">
                    <i class="fas fa-sad-cry fa-8x icon-yellow"></i>
                    <h3 class="mt-4">Page Not Found!</h3>
                </div>
            </div>
            <?php
                include("fragment/footer.php");
            ?>
        </div>
    </div>
</div>
</body>
<script src="/assignment/static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="/assignment/static/vendor/bootstrap/bootstrap.js"></script>
<script src="/assignment/static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="/assignment/static/js/main.js"></script>
</html>