<?php
    include("db.php");
    $table_name = "templates";
    $sql = "select downloads from $table_name";
    $result = mysqli_query($conn,$sql);
    $n_rows = mysqli_num_rows($result);
    if($n_rows==0){
        echo("0");
    }else{
        $n_downloads = 0;
        $arr = $result->fetch_array();
        for($i=0;$i<$n_rows;$i++){
            $n_downloads += $arr[$i];
        }
    }
