<?php
    include("script/template-query.php");
    $template_name = $_GET["template_name"];
    $result = get_template_by_name($conn,$template_name);
    $path = "..".$result->fetch_assoc()["path"];
    echo($path);
