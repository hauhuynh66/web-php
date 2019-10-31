<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
    <link rel="shortcut icon" href="#" />
    <link href="../vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content shadow ml-2">
    <div class="row">
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-indigo" id="sidebar">
            <?php
                include("fragment/sidebar.php");
            ?>
        </div>
        <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
            <?php
                include("fragment/topbar.php");
            ?>
            <div class="main-content m-4">
                <div class="text-center">
                    <h1>About Us</h1>
                </div>
                <hr>
                <h3>Who are we?</h3>
                <hr>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <hr>
                <h3>Purpose</h3>
                <hr>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                <hr>
                <h3>Contacts</h3>
                <hr>
                <div class="row my-4">
                    <div class="col-xl-3 col-lg-4 col-mb-4 col-sm-6 my-2">
                        <button class="btn btn-block btn-primary"><i class="fab fa-facebook mr-4"></i>FaceBook</button>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-mb-4 col-sm-6 my-2">
                        <button class="btn btn-block btn-danger"><i class="fab fa-google mr-4"></i>GMail</button>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-mb-4 col-sm-6 my-2">
                        <button class="btn btn-block btn-info"><i class="fab fa-twitter mr-4"></i>Twitter</button>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-mb-4 col-sm-6 my-2">
                        <button class="btn btn-block btn-primary"><i class="fab fa-linkedin mr-4"></i>Linkedin</button>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-mb-4 col-sm-6 my-2">
                        <button class="btn btn-block btn-secondary"><i class="fab fa-github mr-4"></i>Github</button>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-mb-4 col-sm-6 my-2 text-center pt-2">
                        <i class="fa fa-phone-alt mr-2"></i><span class="text-info"> +84827112xx (Mr.Hau)</span>
                    </div>
                </div>
                <br>
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Address</h5>
                    </div>
                    <div class="card-body">
                        <div id="map" style="width:100%;height:400px;"></div>
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
<script src="../js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCODjgdh3eOnThpHBZzH_u44YPfonsYcIk&callback=initMap"></script>
</body>
</html>