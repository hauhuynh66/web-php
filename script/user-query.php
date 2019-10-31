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
        $user = get_user_by_username($username);
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
