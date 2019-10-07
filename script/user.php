<?php
    require("db.php");
    $table_name = "users";
    $sql = "select * from $table_name";
    $result = mysqli_query($conn,$sql);
    echo(mysqli_num_rows($result));
    $conn->close();
