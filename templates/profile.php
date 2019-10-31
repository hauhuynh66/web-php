<?php
    include("../script/session.php");
    include("../script/user-query.php");
    include_once("../script/locale.php");
    $fn = $lang->{"fn"};
    $ln = $lang->{"ln"};
    $us = $lang->{"us"};
    $t_up = $lang->{"t_up"};
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
                            $firstname = $result["firstname"];
                            $lastname = $result["lastname"];
                            $username = $result["username"];
                            $email = $result["email"];
                            $github = $result["github"];
                            $facebook = $result["facebook"];
                            $twitter = $result["twitter"];
                        ?>
                        <div class="row">
                            <?php
                                echo("<div class=\"col-4\">
                                        <label>$fn :</label>
                                    </div>
                                    <div class=\"col-8\">");
                                echo($firstname."</div>");
                            ?>
                        </div>
                        <div class="row">
                            <?php
                            echo("<div class=\"col-4\">
                                        <label>$ln :</label>
                                    </div>
                                    <div class=\"col-8\">");
                            echo($lastname."</div>");
                            ?>
                        </div>
                        <div class="row">
                            <?php
                            echo("<div class=\"col-4\">
                                        <label>$us :</label>
                                    </div>
                                    <div class=\"col-8\">");
                            echo($username."</div>");
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Email :</label>
                            </div>
                            <div class="col-8">
                                <?php
                                    echo("<a href='$email']>".$email."</a>");
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Github :</label>
                            </div>
                            <div class="col-8">
                                <?php
                                    echo("<a href='$github']>".$github."</a>");
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Facebook :</label>
                            </div>
                            <div class="col-8">
                                <?php
                                    echo("<a href='$facebook']>".$facebook."</a>");
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Twitter :</label>
                            </div>
                            <div class="col-8">
                                <?php
                                    echo("<a href='$twitter']>".$twitter."</a>");
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            echo("<div class=\"col-4\">
                                            <label>$t_up :</label>
                                        </div>
                                    <div class=\"col-8\">");
                            $uploads = get_user_uploaded_templates($conn,$result["username"]);
                            if(!$uploads){
                                echo("<a>0</a>");
                            }else{
                                echo("<a>".mysqli_num_rows($uploads)."</a></div>");
                            }
                            ?>
                        </div>
                        <div class="row my-4">
                            <div class="col-6">
                                <button class="btn btn-info btn-block mt-3" id="change-info-btn" data-toggle="modal" data-target="#change-info-modal">
                                    <i class="fa fa-user-secret mr-4"></i>Change Informations
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-info btn-block mt-3" id="change-password-btn" data-toggle="modal" data-target="#change-password-modal">
                                    <i class="fa fa-key mr-4"></i>Change Password
                                </button>
                            </div>
                        </div>
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
                <h5 class="modal-title">Change Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <?php
                        echo("<input class='form-control' placeholder='First name' id='first-name' value='$firstname'>
                        <input class='form-control mt-3' placeholder='Last name' id='last-name' value='$lastname'>
                        <input class='form-control mt-3' placeholder='Username' id='username' value='$username'>
                        <input class='form-control mt-3' placeholder='Email' id='email' value='$email'>
                        <input class='form-control mt-3' placeholder='Github' id='github' value='$github'>
                        <input class='form-control mt-3' placeholder='Facebook' id='twitter' value='$facebook'>
                        <input class='form-control mt-3' placeholder='Twitter' id='twitter' value='$twitter'>");

                    ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Confirm</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Change Password-->
<div class="modal fade" tabindex="-1" role="dialog" id="change-password-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <?php
                    echo("<input class='form-control' id='old-password' placeholder='Old Password'>
                           <input class='form-control my-3' id='new-password' placeholder='New Password'>
                           <input class='form-control my-3' id='pass-confirm' placeholder='Re-Password'>");
                    ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Confirm</button>
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
