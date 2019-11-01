<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forbidden</title>
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
            <div class="main-content m-5">
                <div class="container text-center">
                    <i class="fas fa-user-secret fa-8x icon-danger"></i>
                    <h3 class="mt-4">Forbidden!</h3>
                    <h3 class="mt-2">You Don't Have Permission!</h3>
                </div>
            </div>
            <?php
                include("fragment/footer.php");
            ?>
        </div>
    </div>
</div>
</body>
<script src="../vendor/jquery/jquery-3.4.1.js"></script>
<script src="../vendor/bootstrap/bootstrap.js"></script>
<script src="../vendor/font-awesome/js/fontawesome.js"></script>
<script src="../js/main.js"></script>
</html>