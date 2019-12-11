<?php
    include_once("../config/lang.php");
    include_once("../model/user.php");
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $user = new user($conn);
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
        $role = $user->getRole($username);
    }
?>
<div class="mt-4">
    <a href="../index.php" class="sidebar-brand normal-text">
        <i class="fa fa-cubes fa-4x"></i>
        <span class="large-text">Templates<sup>TM</sup></span>
    </a>
</div>
<br>
<div class="item-holder pb-0 border-bottom-0">
    <div class="sidebar-item">
        <a href="index.php" class="sidebar-text normal-text py-2">
            <i class="fa fa-home large-text"></i>
            <?php
                echo("<span class='ml-2'>".$lang->{"home"}."</span>")
            ?>
        </a>
    </div>
</div>
<?php
    if(isset($role)&&$role=="ADMIN") {
        echo("<div class='item-holder pb-0 border-bottom-0'>
            <div class='sidebar-item'>
            <a href='users.php' class='sidebar-text normal-text py-2'>
                <i class='fa fa-users large-text'></i>");
        echo("<span class='ml-2'>Users</span></a></div></div>");
    }
?>
<div class="item-holder border-bottom-0">
    <div class="sidebar-item">
        <a href="powerpoint.php?page=1&filter=dls" class="sidebar-text normal-text pt-2">
            <i class="fa fa-file-powerpoint large-text"></i>
            <span class='ml-2'>PowerPoint</span>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="web.php?page=1&filter=dls" class="sidebar-text normal-text pt-2">
            <i class="fa fa-globe large-text"></i>
            <span class='ml-2'>Web</span>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="upload.php" class="sidebar-text normal-text pt-2">
            <i class="fa fa-upload large-text"></i>
            <?php
                echo("<span class='ml-2'>".$lang->{"upload"}."</span>")
            ?>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="about.php" class="sidebar-text normal-text pt-2">
            <i class="fa fa-info-circle large-text"></i>
            <?php
                echo("<span class='ml-2'>".$lang->{"about"}."</span>")
            ?>
        </a>
    </div>
</div>