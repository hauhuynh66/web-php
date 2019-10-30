<?php
    include("../script/session.php");
    include("../script/user-query.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
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
                <div class="row">
                    <div class="col-4 text-center">
                        <div class="container">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="text-dark">
                                        <?php
                                            $result = get_user_role($conn,$_SESSION["username"])->fetch_assoc();
                                            echo($result["role"]);
                                        ?>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <i class="fa fa-user-circle fa-8x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <?php
                            $result = get_user_by_username($conn,$_SESSION['username'])->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-3">
                                <label>First name :</label>
                            </div>
                            <div class="col-9">
                                <?php
                                    echo($result["firstname"]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>Last name :</label>
                            </div>
                            <div class="col-9">
                                <?php
                                    echo($result["lastname"]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>Username :</label>
                            </div>
                            <div class="col-9">
                                <?php
                                    echo($result["username"]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>Email :</label>
                            </div>
                            <div class="col-9">
                                <?php
                                    $email = $result["email"];
                                    echo("<a href='$email']>".$email."</a>");
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>Github :</label>
                            </div>
                            <div class="col-9">
                                <?php
                                    $git = $result["github"];
                                    echo("<a href='$git']>".$git."</a>");
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>Facebook :</label>
                            </div>
                            <div class="col-9">
                                <?php
                                    $fb = $result["facebook"];
                                    echo("<a href='$fb']>".$fb."</a>");
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label>Twitter :</label>
                            </div>
                            <div class="col-9">
                                <?php
                                    $tw = $result["twitter"];
                                    echo("<a href='$tw']>".$tw."</a>");
                                ?>
                            </div>
                        </div>
                        <button class="btn btn-info mt-3" id="change-info-btn" data-toggle="modal" data-target="#change-info-modal">Change</button>
                    </div>
                </div>
            </div>

            <?php
                include("fragment/footer.php");
            ?>
        </div>

    </div>
</div>
<!--Change info-->
<div class="modal fade" tabindex="-1" role="dialog" id="change-info-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input class="form-control" placeholder="First name" id="first-name">
                    <input class="form-control mt-3" placeholder="Last name" id="last-name">
                    <input class="form-control mt-3" placeholder="Username" id="username">
                    <input class="form-control mt-3" placeholder="Email" id="email">
                    <input class="form-control mt-3" placeholder="Password" id="password">
                    <input class="form-control mt-3" placeholder="Github" id="github">
                    <input class="form-control mt-3" placeholder="Facebook" id="twitter">
                    <input class="form-control mt-3" placeholder="Twitter" id="twitter">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="../vendor/jquery/jquery-3.4.1.js"></script>
<script src="../vendor/bootstrap/bootstrap.js"></script>
<script src="../vendor/font-awesome/js/fontawesome.js"></script>
<script src="../js/main.js"></script>
</body>
