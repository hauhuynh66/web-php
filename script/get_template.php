<?php
    require("db.php");
    function get_web_template($conn,$name){
        $table_name = "templates";
        $sql = "select * from $table_name where title = '$name' and type='web'";
        return mysqli_query($conn,$sql)->fetch_assoc();
    }
    function get_powerpoint_template($conn,$name){
        $table_name = "templates";
        $sql = "select * from $table_name where title = '$name' and type='powerpoint'";
        return mysqli_query($conn,$sql)->fetch_assoc();
    }


