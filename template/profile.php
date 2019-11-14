<?php
    require_once("../controller/session.php");
    require_once("../model/user.php");
    include_once("../config/lang.php");
    include_once("../controller/utils.php");
    $username = $_SESSION["username"];
    $result = $user->get_by_username($username)->fetch_assoc();
    $role = $user->get_role($username,"role");
    $firstname = $result["firstname"];
    $lastname = $result["lastname"];
    $username = $result["username"];
    $email = $result["email"];
    $github = $result["github"];
    $facebook = $result["facebook"];
    $twitter = $result["twitter"];
    $uploads = mysqli_num_rows($user->get_uploaded_templates($result["username"]));
    $img = "/assignment/static/vendor/icon/animal/".$result["picture"].".svg";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="shortcut icon" href="#" />
    <link href="../static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../static/css/main.css" rel="stylesheet" type="text/css">
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
            <div class="main-content my-4 ml-4">
                <div class="row">
                    <div class="col-4 text-center">
                        <div class="container">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="text-dark">
                                        <?php
                                            echo($role);
                                        ?>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                        echo("<img src='$img' class='profile-image'></div>");
                                        if($_SESSION["username"]==$username){
                                            echo("<div class='card-footer'>
                                                    <button class='btn btn-block btn-success' data-toggle='modal' data-target='#change-image-modal'>Change Image</button>
                                                </div>");
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <?php
                                echo("<div class='col-4'>
                                        <label>".$lang->{"fn"}." :</label>
                                    </div>
                                    <div class='col-8'>");
                                echo($firstname."</div>");
                            ?>
                        </div>
                        <div class="row">
                            <?php
                            echo("<div class='col-4'>
                                        <label>".$lang->{"ln"}." :</label>
                                    </div>
                                    <div class='col-8'>");
                            echo($lastname."</div>");
                            ?>
                        </div>
                        <div class="row">
                            <?php
                            echo("<div class='col-4'>
                                        <label>".$lang->{"un"}." :</label>
                                    </div>
                                    <div class='col-8'>");
                            echo("<span id='username'>".$username."</span></div>");
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
                            echo("<div class='col-4'>
                                            <label>".$lang->{"temp_upload"}." :</label>
                                        </div>
                                    <div class='col-8'>");
                            if(!$uploads){
                                echo("<a>0</a></div>");
                            }else{
                                echo("<a href='./list.php?uploader=$username'>".$uploads."</a></div>");
                            }
                            ?>
                        </div>
                        <div class="row my-4">
                            <div class="col-6">
                                <button class="btn btn-info btn-block mt-3" id="change-info-btn" data-toggle="modal" data-target="#change-info-modal">
                                    <i class="fa fa-user-secret mr-4"></i>
                                    <?php
                                        echo($lang->{"change_i"});
                                    ?>
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-info btn-block mt-3" id="change-password-btn" data-toggle="modal" data-target="#change-password-modal">
                                    <i class="fa fa-key mr-4"></i>
                                    <?php
                                        echo($lang->{"change_p"});
                                    ?>
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
                <button type="button" class="btn btn-primary" id="change-info-btn">Confirm</button>
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
                    echo("<p id='user' hidden>$username</p>
                           <input class='form-control' id='old-password' placeholder='Old Password'>
                           <input class='form-control my-3' id='new-password' placeholder='New Password'>
                           <input class='form-control my-3' id='pass-confirm' placeholder='Re-Password'>");
                    ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="change-password-btn">Confirm</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Image Modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="change-image-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <p class="text-info">Change Image</p>
            </div>
            <div class="modal-body overflow-y h-400">
                <?php
                    $path = $_SERVER['DOCUMENT_ROOT']."/assignment/static/vendor/icon/animal/";
                    $relative_path = "../static/vendor/icon/animal/";
                    $count = count_file($path,["*.svg"]);
                    echo("<div class='row'>");
                    for($i=1;$i<=$count;$i++){
                        $fi = sprintf("%02d", $i);
                        $src = $relative_path.'0'.$fi.'.svg';
                        echo("<div class='col-3 mt-4'>");
                        echo("<img class='image-button' src='$src' alt='$fi' id='profile-image-$i'>");
                        echo("</div>");
                    }
                    echo("</div>");
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="change-img-btn">Confirm</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="../static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="../static/vendor/bootstrap/bootstrap.js"></script>
<script src="../static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="../static/js/main.js"></script>
<script src="../static/js/profile.js"></script>
</body>
