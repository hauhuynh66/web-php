<?php
    include_once("../config/locale.php");
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
?>
<div class="navbar navbar-expand navbar-dark shadow bg-white test">
    <div class="w-haft">
        <button class="btn" id="menu-collapse">
            <i class="fas fa-bars"></i>
        </button>
        <?php
            if(isset($_SESSION["username"])){
                echo("<div class='vr'></div>
                <button class='btn round' id='profile-btn'>
                    <i class='fa fa-user-alt icon-black'></i>
                </button>
                <div class='vr'></div>
                <button class='btn round' data-toggle='modal' data-target='#logout-modal'>
                    <i class='fa fa-sign-out-alt icon-black'></i>
                </button>
                <div class='vr'></div>
                <button class='btn'>
                    <i class='fa fa-envelope'></i>
                </button>
                <div class='vr'></div>
                <div class='dropdown'>
                <button class='btn' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fa fa-bell icon-black font-size-15 mr-1'></i>
                    <small class='font-weight-bold text-danger abs-text'>2</small>
                </button>
                <div class='dropdown-menu' aria-labelledby='note-dropdown'>
                    
                </div>
                </div>");
            }
        ?>
    </div>
    <?php
        $l = $lang->{"lang"};
        $en = $lang->{"en"};
        $vn = $lang->{"vn"};
        $fr = $lang->{"fr"};
        echo("<div class='input-group w-haft justify-content-end'>
            <div class='dropdown dropleft'>
                <button class='btn dropdown-toggle' type='button' id='languageBtn' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    $l
                </button>
                <div class='dropdown-menu' aria-labelledby='language-dropdown'>
                    <a class='dropdown-item' href='#' id='lang-en'><img src='../static/vendor/icon/flag/england.svg' class='small-flag mr-3 mb-1' alt='en'>$en</a>
                    <a class='dropdown-item' href='#' id='lang-vn'><img src='../static/vendor/icon/flag/vietnam.svg' class='small-flag mr-3 mb-1' alt='vn'>$vn</a>
                    <a class='dropdown-item' href='#' id='lang-fr'><img src='../static/vendor/icon/flag/france.svg' class='small-flag mr-3 mb-1' alt='fr'>$fr</a>
                </div>
            </div>
        </div>");
    ?>
</div>
<!--Logout Confirm-->
<div class="modal fade" tabindex="-1" role="dialog" id="logout-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Logout Confirm</h3>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                    <i class="fas fa-info-circle fa-8x icon-danger"></i>
                </div>
                <div class="container text-center">
                    <h4 class="text-danger">Are you sure you want to logout this account?</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="logout-btn">Confirm</button>
                <button class="btn btn-outline-info" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
