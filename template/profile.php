<?php
    //include_once("../controller/utils.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="shortcut icon" href="#" />
    <link href="/assignment/static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/css/main.css" rel="stylesheet" type="text/css">
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
                                        echo("<img src='$img' class='profile-image' alt='image'></div>");
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
                                        <label>".$l->{"fn"}." :</label>
                                    </div>
                                    <div class='col-8'>");
                                echo($firstname."</div>");
                            ?>
                        </div>
                        <div class="row">
                            <?php
                            echo("<div class='col-4'>
                                        <label>".$l->{"ln"}." :</label>
                                    </div>
                                    <div class='col-8'>");
                            echo($lastname."</div>");
                            ?>
                        </div>
                        <div class="row">
                            <?php
                            echo("<div class='col-4'>
                                        <label>".$l->{"un"}." :</label>
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
                                            <label>".$l->{"template_up"}." :</label>
                                        </div>
                                    <div class='col-8'>");
                            if(!$uploads){
                                echo("<a>0</a></div>");
                            }else{
                                echo("<a href='/assignment/list/$username'>".$uploads."</a></div>");
                            }
                            ?>
                        </div>
                        <div class="row my-4">
                            <div class="col-6">
                                <button class="btn btn-info btn-block mt-3" id="change-info-btn" data-toggle="modal" data-target="#change-info-modal">
                                    <i class="fa fa-user-secret mr-4"></i>
                                    <?php
                                        echo($l->{"change_i"});
                                    ?>
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-info btn-block mt-3" id="change-password-btn" data-toggle="modal" data-target="#change-password-modal">
                                    <i class="fa fa-key mr-4"></i>
                                    <?php
                                        echo($l->{"change_p"});
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center d-block mt-1">
                <h5 class="text-info">Change Info</h5>
            </div>
            <div class="modal-body">
                <form>
                    <?php
                        echo("<label for='edit-firstname'>First name</label>
                        <input class='form-control' placeholder='First name' id='edit-firstname' value='$firstname'>
                        <label for='edit-lastname' class='my-2'>Last name</label>
                        <input class='form-control' placeholder='Last name' id='edit-lastname' value='$lastname'>
                        <label for='edit-username' class='my-2'>Username</label>
                        <input class='form-control' placeholder='Username' id='edit-username' value='$username'>
                        <label for='edit-email' class='my-2'>Email</label>
                        <input class='form-control' placeholder='Email' id='edit-email' value='$email'>
                        <label for='edit-github' class='my-2'>Github</label>
                        <input class='form-control' placeholder='Github' id='edit-github' value='$github'>
                        <label for='edit-firstname' class='my-2'>Facebook</label>
                        <input class='form-control' placeholder='Facebook' id='edit-facebook' value='$facebook'>
                        <label for='edit-firstname' class='my-2'>Twitter</label>
                        <input class='form-control' placeholder='Twitter' id='edit-twitter' value='$twitter'>");

                    ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="change-info-confirm">Confirm</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Change Password-->
<div class="modal fade" tabindex="-1" role="dialog" id="change-password-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center d-block mt-1">
                <h5 class="modal-title">Change Password</h5>
            </div>
            <div class="modal-body">
                <form>
                    <?php
                    echo("<div id='p-error' class='text-center'></div>
                           <label for='old-password'>Old Password</label>
                           <input class='form-control' type='password' id='old-password'>
                           <label for='new-password' class='my-2'>New Password</label>
                           <input class='form-control' type='password' id='new-password'>
                           <label for='pass-confirm' class='my-2'>Repeat Password</label>
                           <input class='form-control' type='password' id='pass-confirm'>");
                    ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="change-password-confirm">Confirm</button>
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
                <h5 class="text-info">Change Image</h5>
            </div>
            <div class="modal-body overflow-y h-400">
                <?php
                    $path = $_SERVER['DOCUMENT_ROOT']."/assignment/static/vendor/icon/animal/";
                    $relative_path = "/assignment/static/vendor/icon/animal/";
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

<script src="/assignment/static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="/assignment/static/vendor/bootstrap/bootstrap.js"></script>
<script src="/assignment/static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="/assignment/static/js/main.js"></script>
<script src="/assignment/static/js/profile.js"></script>
</body>
