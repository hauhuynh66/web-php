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

