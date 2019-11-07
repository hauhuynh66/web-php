<?php
    require_once("db.php");
    function get_web_template($conn,$name){
        $table_name = "templates";
        $sql = "select * from $table_name where name = '$name' and type='web'";
        return mysqli_query($conn,$sql)->fetch_assoc();
    }
    function get_powerpoint_template($conn,$name){
        $table_name = "templates";
        $sql = "select * from $table_name where name = '$name' and type='powerpoint'";
        return mysqli_query($conn,$sql)->fetch_assoc();
    }
    function get_template_by_name($conn,$name){
        $sql = "select * from template where name = '$name'";
        return mysqli_query($conn,$sql);
    }

    function get_template_by_download($conn, $type){
        $sql = "select * from template where type = '$type' order by downloads desc limit 4";
        return mysqli_query($conn,$sql);
    }

    function get_all_template_by_type($conn, $type){
        $sql = "select * from template where type = '$type'";
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

    function get_all_templates_by_uploader($conn,$uploader){
        $table_name = "templates";
        $sql = "select * from $table_name where uploader='$uploader'";
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

    function display_ppt($result,$i){
        $name = $result["name"];
        $title = $result["title"];
        $download = $result["downloads"];
        $path = "../image/preview".$result["path"]."/img1.jpg";
        $description = $result["description"];
        echo("<div class='col-xl-6 col-lg-6 col-mb-6 col-sm-12 col-pt-4'>
                        <div class='card shadow'>
                            <div class='card-header'>
                                <div class='row'>
                                    <div class='col-6 w-haft'>
                                        <h5 id='tp-title'>$title</h5>
                                        <small id='tp-name-$i' hidden>$name</small>
                                    </div>
                                    <div class='col-6 w-haft justify-content-end'>
                                        <small class='text-info'><i class='fa fa-download mr-2'></i> $download</small>
                                    </div>
                                </div>
                        </div>
                        <div class='card-body card-body-fixed'>
                            <img src=$path alt='?' class='image-holder'>
                            <div class='description'>
                                <p>$description</p>
                            </div>
                        </div>
                        <div class='card-footer text-center'>
                            <a class='btn btn-danger float-left item' href='powerpoint-preview.php?name=$name'>
                                <i class='fas fa-eye pr-1'></i>Details
                            </a>
                            <i class='text-center fa fa-book-open fa-2x icon-danger'></i>
                            <a class='btn btn-danger float-right item' data-toggle='modal' data-target='#download-modal'>
                                <i class='fas fa-download pr-1'></i>Download
                            </a>
                        </div>
                    </div>
                </div>");
    }

    function display_web($result,$i){
        $name = $result["name"];
        $title = $result["title"];
        $download = $result["downloads"];
        $path = "../image/preview".$result["path"]."/img1.jpg";
        $description = $result["description"];
        echo("<div class='col-xl-6 col-lg-6 col-mb-6 col-sm-12 pt-4'>
                        <div class='card shadow'>
                            <div class='card-header'>
                                <div class='row'>
                                    <div class='col-6 w-haft'>
                                        <h5 id='tp-title'>$title</h5>
                                        <small id='tp-name-$i' hidden>$name</small>
                                    </div>
                                    <div class='col-6 w-haft justify-content-end'>
                                        <small class='text-info'><i class='fa fa-download mr-2'></i>$download</small>
                                    </div>
                                </div>
                        </div>  
                        <div class='card-body card-body-fixed'>
                            <img src=$path alt='?' class='image-holder'>
                            <div class='description'>
                                <p>$description</p>
                            </div>
                        </div>
                        <div class='card-footer text-center'>
                            <a class='btn btn-success float-left item' href='web-preview.php?name=$name'>
                                <i class='fas fa-eye pr-1'></i>Details
                            </a>
                            <i class='text-center fa fa-globe fa-2x icon-success'></i>
                            <a class='btn btn-success float-right item' data-toggle='modal' data-target='#download-modal' id='download-btn-$i'>
                                <i class='fas fa-download pr-1'></i>Download
                            </a>
                        </div>
                    </div>
                </div>");
    }