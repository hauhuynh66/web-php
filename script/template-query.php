<?php
    require_once("db.php");

    function get_template_by_name($conn,$name){
        $sql = "select * from templates where title = '$name'";
        return mysqli_query($conn,$sql);
    }

    function get_template_by_download($conn, $type){
        $sql = "select * from templates where type = '$type' order by downloads desc limit 4";
        return mysqli_query($conn,$sql);
    }

    function get_all_template_by_type($conn, $type){
        $sql = "select * from templates where type = '$type'";
        return mysqli_query($conn,$sql);
    }

    function get_template_by_type_with_limit($conn, $type, $limit, $offset, $mode){
        $table_name = "templates";
        if($mode=="dls"){
            $sql = "select * from $table_name where type = '$type' order by downloads desc limit $limit offset $offset";
        }else{
            $sql = "select * from $table_name where type = '$type' order by upload_date desc  limit $limit offset $offset";
        }
        return mysqli_query($conn,$sql);
    }

    function get_all_templates($conn){
        $table_name = "templates";
        $sql = "select * from $table_name";
        return mysqli_query($conn,$sql);
    }

    function get_total_downloads($result){
        $n_rows = mysqli_num_rows($result);
        if($n_rows==0){
            return 0;
        }else{
            $n_downloads = 0;
            while($row=$result->fetch_assoc()){
                $n_downloads += $row["downloads"];
            }
            return $n_downloads;
        }
    }

    function display_ppt($result){
        $title = $result["title"];
        $download = $result["downloads"];
        $path = "..".$result["path"]."/image/preview.jpg";
        $description = $result["description"];
        echo("<div class='col-6 pt-4'>
                        <div class='card shadow'>
                            <div class='card-header'>
                                <div class='row'>
                                    <div class='col-6 w-haft'>
                                        <h5 id='tp-name'>$title</h5>
                                    </div>
                                    <div class='col-6 w-haft justify-content-end'>
                                        <small class='text-info'>Downloads: $download</small>
                                    </div>
                                </div>
                        </div>
                        <div class='card-body card-body-fixed'>
                            <img src=$path alt='?' class='image-holder'>
                            <div class='description'>
                                <p>$description</p>
                            </div>
                        </div>
                        <div class='card-footer'>
                            <a class='btn btn-success item' href='powerpoint-preview.php?name=$title'>
                                <i class='fas fa-eye pr-1'></i>Details
                            </a>
                            <a class='btn btn-success float-right item' data-toggle='modal' data-target='#download-modal'>
                                <i class='fas fa-download pr-1'></i>Download
                            </a>
                        </div>
                    </div>
                </div>");
    }

    function display_web($result){
            $title = $result["title"];
            $download = $result["downloads"];
            $path = "..".$result["path"]."/image/preview.jpg";
            $description = $result["description"];
            echo("<div class='col-6 pt-4'>
                        <div class='card shadow'>
                            <div class='card-header'>
                                <div class='row'>
                                    <div class='col-6 w-haft'>
                                        <h5 id='tp-name'>$title</h5>
                                    </div>
                                    <div class='col-6 w-haft justify-content-end'>
                                        <small class='text-info'>Downloads: $download</small>
                                    </div>
                                </div>
                        </div>  
                        <div class='card-body card-body-fixed'>
                            <img src=$path alt='?' class='image-holder'>
                            <div class='description'>
                                <p>$description</p>
                            </div>
                        </div>
                        <div class='card-footer'>
                            <a class='btn btn-success item' href='web-preview.php?name=$title'>
                                <i class='fas fa-eye pr-1'></i>Details
                            </a>
                            <a class='btn btn-success float-right item' data-toggle='modal' data-target='#download-modal' id='download-btn'>
                                <i class='fas fa-download pr-1'></i>Download
                            </a>
                        </div>
                    </div>
                </div>");
    }