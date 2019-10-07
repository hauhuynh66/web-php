<?php
    require("db.php");
    $table_name = "users";
    $f_name = $_POST["first-name"];
    $l_name = $_POST["last-name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $hash_password = password_hash($password,PASSWORD_DEFAULT);
    $select_sql = "select * from $table_name where username='$email' or email='$email' limit 1";
    $result = mysqli_query($conn,$select_sql);
    if(mysqli_num_rows($result)==0){
        $sql = "insert into $table_name(firstname,lastname,username,email,password) values ('$f_name','$l_name','$username','$email','$hash_password')";
        mysqli_query($conn,$sql);
    }
    $conn->close();