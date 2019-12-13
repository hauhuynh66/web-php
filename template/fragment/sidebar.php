<div class="mt-4">
    <a href="/assignment/" class="sidebar-brand normal-text">
        <i class="fa fa-cubes fa-4x"></i>
        <span class="large-text">Templates<sup>TM</sup></span>
    </a>
</div>
<br>
<div class="item-holder pb-0 border-bottom-0">
    <div class="sidebar-item">
        <a href="/assignment/" class="sidebar-text normal-text py-2">
            <i class="fa fa-home large-text"></i>
            <?php
                echo("<span class='ml-2'>".$l->{"home"}."</span>")
            ?>
        </a>
    </div>
</div>
<?php
    if(isset($role)&&$role=="ADMIN") {
        echo("<div class='item-holder pb-0 border-bottom-0'>
            <div class='sidebar-item'>
            <a href='/assignment/users' class='sidebar-text normal-text py-2'>
                <i class='fa fa-users large-text'></i>");
        echo("<span class='ml-2'>Users</span></a></div></div>");
        echo("<div class='item-holder pb-0 border-bottom-0'>
            <div class='sidebar-item'>
            <a href='/assignment/templates' class='sidebar-text normal-text py-2'>
                <i class='fa fa-file-alt large-text'></i>");
        echo("<span class='ml-2'>List</span></a></div></div>");
    }
?>
<div class="item-holder border-bottom-0">
    <div class="sidebar-item">
        <a href="/assignment/powerpoint/page1&dls" class="sidebar-text normal-text pt-2">
            <i class="fa fa-file-powerpoint large-text"></i>
            <span class='ml-2'>PowerPoint</span>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="/assignment/web/page1&dls" class="sidebar-text normal-text pt-2">
            <i class="fa fa-globe large-text"></i>
            <span class='ml-2'>Web</span>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="/assignment/upload" class="sidebar-text normal-text pt-2">
            <i class="fa fa-upload large-text"></i>
            <?php
                echo("<span class='ml-2'>".$l->{"upload"}."</span>")
            ?>
        </a>
    </div>
</div>
<div class="item-holder">
    <div class="sidebar-item">
        <a href="/assignment/about" class="sidebar-text normal-text pt-2">
            <i class="fa fa-info-circle large-text"></i>
            <?php
                echo("<span class='ml-2'>".$l->{"about"}."</span>")
            ?>
        </a>
    </div>
</div>