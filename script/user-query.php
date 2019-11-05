<?php
    require_once("db.php");
    function get_user_by_username($conn,$username){
        $table_name = "users";
        $sql = "select * from $table_name where username = '$username'";
        return mysqli_query($conn,$sql);
    }

    function get_all_users($conn){
        $table_name = "users";
        $sql = "select * from $table_name";
        return mysqli_query($conn,$sql);
    }

    function get_user_role($conn,$username){
        $table = "role";
        $user = get_user_by_username($conn,$username);
        if(mysqli_num_rows($user)==0){
            return 0;
        }else{
            $sql = "select * from $table where username='$username'";
            return mysqli_query($conn,$sql);
        }
    }

    function get_user_by_email($conn,$email){
        $table = "users";
        $sql = "select * from $table where email='$email'";
        return mysqli_query($conn,$sql);
    }

    function get_user_by_username_and_email($conn,$username,$email){
        $table = "users";
        $sql = "select * from $table where username='$username' and email = '$email' limit 1";
        return mysqli_query($conn,$sql);
    }

    function insert_user($conn,$f_name,$l_name,$username,$email,$hash_password){
        $table_name = "users";
        $sql = "insert into $table_name(firstname,lastname,username,email,password) values ('$f_name','$l_name','$username','$email','$hash_password')";
        return mysqli_query($conn,$sql);
    }

    function get_user_uploaded_templates($conn,$username){
        $user = get_user_by_username($conn,$username);
        if(mysqli_num_rows($user)==0){
            return 0;
        }else{
            $sql = "select * from templates where uploader = '$username'";
            return mysqli_query($conn,$sql);
        }
    }

    function update_active_time($conn,$username){
        $user = get_user_by_username($conn,$username);
        if($user==null){
            die();
        }else{
            $role_id = get_user_role($conn,$username)->fetch_assoc()["id"];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d H:i:s");
            $sql = "update role set lastest='$date' where id='$role_id'";
            return mysqli_query($conn,$sql);
        }
    }

    function insert_role($conn,$username){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");
        $sql = "insert into role(username,role,status,lastest) values ('$username','USER','ACTIVE','$date')";
        return mysqli_query($conn,$sql);
    }

    function block_user($conn,$user){

    }

    function display_user($conn,$user){
        $role = get_user_role($conn,$user["username"])->fetch_assoc();
        echo("<div class='row mb-5'><div class='col-2'>");
        if($role["role"]=="ADMIN"){
            echo("<i class='fa fa-user-cog fa-2x'></i></div>");
        }else{
            echo("<i class='fa fa-user-tie fa-2x'></i></div>");
        }
        echo("<div class='col-3 text-center mt-2'>".$user["username"]."</div>");
        if($role["status"]=="ACTIVE"){
            echo("<div class='col-3 text-center'><a class='btn btn-success round lock' href='#'><i class='fa fa-lock-open lock'></i></a></div>");
        }else{
            echo("<div class='col-3 text-center'><a class='btn btn-danger round' href='#'><i class='fa fa-lock unlock'></i></a></div>");
        }
        echo("<div class='col-4 text-right mt-2'>".$role["lastest"]."</div></div>");
    }
