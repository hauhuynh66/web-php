<?php
    require("db.php");
    $name = $_GET["name"];
    $table_name = "templates";
    $sql = "select * from $table_name where title = '$name'";
    $result = mysqli_query($conn,$sql)->fetch_assoc();
    $downloads = $result["downloads"];
    $des = $result["description"];
    $path = $result["path"];