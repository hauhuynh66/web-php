<?php
    include_once("../script/user-query.php");
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION["username"])){
        header("Location:../template/login.php");
    }else{
        $username = $_SESSION["username"];
        $user = get_user_role($conn,$username);
        $role = $user->fetch_assoc()["role"];
        if($role!="ADMIN"){
            header("Location:../template/403.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="shortcut icon" href="#" />
    <link href="../static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../static/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="../static/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content shadow ml-2">
    <div class="row">
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-info" id="sidebar">
            <?php
                include("fragment/sidebar.php");
            ?>
        </div>
        <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
            <?php
                include("fragment/topbar.php");
            ?>
            <div class="main-content m-4">
                <div class="container text-center">
                    <i class="fas fa-users fa-8x icon-info"></i>
                </div>
                <!--<div class="container">
                    <div class="row mt-5">
                        <div class="col-2 text-left">
                            <p class="text-info">Role</p>
                        </div>
                        <div class="col-3 text-center">
                            <p class="text-info">Username</p>
                        </div>
                        <div class="col-3 text-center">
                            <p class="text-info">Status</p>
                        </div>
                        <div class="col-4 text-right">
                            <p class="text-info">Lastest Logout</p>
                        </div>
                    </div>
                    <?php
/*                        $users = get_all_users($conn);
                        while($user = $users->fetch_assoc()){
                            display_user($conn,$user);
                        }
                    */?>
                </div>-->
                <div class="card shadow mt-3 mb-5">
                    <div class="card-header text-center">
                        <p class="text-info">Users</p>
                    </div>
                    <div class="card-body">
                        <div class="dataTables_wrapper">
                            <table class="table table-bordered dataTable" id="userTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10%;">
                                        <span>Role</span>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 20%;">
                                        <span>Username</span>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10%;">
                                        <span>Uploads</span>
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 20%;">
                                        <span>Status</span>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 30%;">
                                        <span>Last Active</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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
</body>
<script src="../static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="../static/vendor/bootstrap/bootstrap.js"></script>
<script src="../static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="../static/vendor/datatables/jquery.dataTables.js"></script>
<script src="../static/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="../static/js/main.js"></script>
<script src="../static/js/users.js"></script>
</html>