<?php
    require_once("db.php");
    $table_name = "test";
    $f_name = $_POST["first-name"];
    $l_name = $_POST["last-name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $select_sql = "select * from $table_name where username='$email' or email='$email' limit 1";
    $result = mysqli_query($conn,$select_sql);
    $user = mysqli_fetch_assoc($result);
    /*if($user){

    }*/

    $conn->close();