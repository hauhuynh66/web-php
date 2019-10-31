<?php
    include_once("../script/locale.php");
    $dashboard = $lang->{"sidebar.db"};
    $upload = $lang->{"sidebar.up"};
    $about = $lang->{"sidebar.ab"};
?>
<div class="sidebar-brand">
    <a href="../index.php" class="normal-text"><h4 class="brand-img pt-4" id="side-brand">Templates<sup>TM</sup></h4></a>
</div>
<br>
<div class="item-holder pb-0 border-bottom-0">
    <div class="sidebar-item">
        <a href="index.php" class="sidebar-text normal-text py-2">
            <i class="fa fa-skull-crossbones large-text mr-2"></i>
            <?php
                echo("<span>".$dashboard."</span>")
            ?>
        </a>
    </div>
</div>
<div class="item-holder border-bottom-0">
    <div class="sidebar-item">
        <a href="powerpoint.php?page=1" class="sidebar-text normal-text pt-2">
            <i class="fa fa-file-powerpoint large-text mr-2"></i>
            <span>PowerPoint</span>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="web.php?page=1" class="sidebar-text normal-text pt-2">
            <i class="fab fa-whatsapp large-text mr-2"></i>
            <span>Web</span>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="upload.php" class="sidebar-text normal-text pt-2">
            <i class="fa fa-upload large-text mr-2"></i>
            <?php
                echo("<span>".$upload."</span>")
            ?>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="about.php" class="sidebar-text normal-text pt-2">
            <i class="fa fa-info-circle large-text mr-2"></i>
            <?php
                echo("<span>".$about."</span>")
            ?>
        </a>
    </div>
</div>