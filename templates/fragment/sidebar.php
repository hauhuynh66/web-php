<?php
    include_once("../script/locale.php");
    $dashboard = $lang->{"sidebar.db"};
    $upload = $lang->{"sidebar.up"};
    $about = $lang->{"sidebar.ab"};
?>
<div class="mt-4">
    <a href="../index.php" class="sidebar-brand normal-text">
        <i class="fa fa-cubes fa-4x pr-2"></i>
        <span class="large-text">Templates<sup>TM</sup></span>
    </a>
</div>
<br>
<div class="item-holder pb-0 border-bottom-0">
    <div class="sidebar-item">
        <a href="index.php" class="sidebar-text normal-text py-2">
            <i class="fa fa-chalkboard-teacher large-text pr-2"></i>
            <?php
                echo("<span>".$dashboard."</span>")
            ?>
        </a>
    </div>
</div>
<div class="item-holder border-bottom-0">
    <div class="sidebar-item">
        <a href="powerpoint.php?page=1" class="sidebar-text normal-text pt-2">
            <i class="fa fa-file-powerpoint large-text pr-2"></i>
            <span>PowerPoint</span>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="web.php?page=1" class="sidebar-text normal-text pt-2">
            <i class="fa fa-globe large-text pr-2"></i>
            <span>Web</span>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="upload.php" class="sidebar-text normal-text pt-2">
            <i class="fa fa-upload large-text pr-2"></i>
            <?php
                echo("<span>".$upload."</span>")
            ?>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="about.php" class="sidebar-text normal-text pt-2">
            <i class="fa fa-info-circle large-text pr-2"></i>
            <?php
                echo("<span>".$about."</span>")
            ?>
        </a>
    </div>
</div>