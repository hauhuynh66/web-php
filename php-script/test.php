<?php
    $servername = "localhost";
    $username = "phuochau";
    $password = "Hauhuynh";
    $dbname = "web";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Connection Failed: " .mysqli_connect_error());
    }
    echo "Connect Successfully";
?>