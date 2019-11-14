<?php
    include_once("../model/user.php");
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION["username"])){
        header("Location:../template/login.php");
    }else{
        $username = $_SESSION["username"];
        $role = $user->get_role($username,"role");
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
                <div class="card shadow mt-3 mb-5">
                    <div class="card-header text-center">
                        <p class="text-info">Users</p>
                    </div>
                    <div class="card-body">
                        <div class="dataTables_wrapper">
                            <table class="table table-bordered dataTable" id="userTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead class="text-center">
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

                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 10%;">
                                        <span>Status</span>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20%;">
                                        <span>Last Active</span>
                                    </th>
                                    <?php
                                        if($role=="ADMIN"){
                                            echo ("<th class='sorting' tabindex='0' aria-controls='dataTable' rowspan='1' colspan='1' aria-label='Start date: activate to sort column ascending' style='width: 20%;'>
                                                        <span>Actions</span></th>");
                                        }
                                    ?>

                                </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                        $user = new user($conn);
                                        $users = $user->get_all();
                                        $i = 0;
                                        while ($u = $users->fetch_assoc()){
                                            $i++;
                                            $role = $user->get_role($u["username"],"role");
                                            $upload = mysqli_num_rows($user->get_uploaded_templates($u["username"]));
                                            $status = $user->get_role($u["username"],"status");
                                            $lastest = $user->get_role($u["username"],"lastest");
                                            if($role=="ADMIN"){
                                                $icon = "<i class='fa fa-user-shield'></i>";
                                            }else{
                                                $icon = "<i class='fa fa-user-tie'></i>";
                                            }
                                            echo("<tr>
                                                <td>$icon</td>
                                                <td id='username-$i'>".$u["username"]."</td>
                                                <td>$upload</td>
                                                <td>$status</td>
                                                <td>$lastest</td>");
                                            if($u["username"]==$_SESSION["username"]){
                                                echo("<td><button class='btn btn-success' disabled><i class='fa fa-check'></i></button>");
                                            }else{
                                                echo("<td><button class='btn btn-danger' id='ban-btn-$i'><i class='fa fa-ban'></i></button>");
                                            }
                                            echo ("<button class='btn btn-info ml-3' id='profile-btn'><i class='fa fa-search'></i></button></td></tr>");
                                        }
                                    ?>
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