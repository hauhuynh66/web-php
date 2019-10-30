<?php
    require("db.php");
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
        $sql = "select * from $table where username='$username'";
        return $result = mysqli_query($conn,$sql);
    }

    function get_user_by_email($conn,$email){
        $table = "users";
        $sql = "select * from $table where email='$email'";
        return mysqli_query($conn,$sql);
    }

    function get_user_by_username_and_email(){

    }

