<div class="navbar navbar-expand navbar-dark shadow bg-white">
    <div class="w-haft">
        <button class="btn" id="menu-collapse">
            <i class="fas fa-bars"></i>
        </button>
        <div class="vr"></div>
        <button class="btn btn-success round" id="profile-btn">
            <i class="fa fa-user-alt icon-black"></i>
        </button>
        <div class="vr"></div>
        <button class="btn btn-danger round" data-toggle="modal" data-target="#logout-modal">
            <i class="fa fa-sign-out-alt icon-black"></i>
        </button>
    </div>
    <div class="input-group w-haft justify-content-end">
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Language
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">English</a>
                <a class="dropdown-item" href="#">Vietnamese</a>
                <a class="dropdown-item" href="#">Russia</a>
            </div>
        </div>
    </div>
</div>
<!--Logout Confirm-->
<div class="modal fade" tabindex="-1" role="dialog" id="logout-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Logout Confirm</h3>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="logout-btn">Confirm</button>
                <button class="btn btn-outline-info" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
