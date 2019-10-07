<?php
    include("db.php");
    $table_name = "templates";
    $sql = "select * from $table_name";
    $result = mysqli_query($conn,$sql);
    $n_rows = mysqli_num_rows($result);
    echo($n_rows);
