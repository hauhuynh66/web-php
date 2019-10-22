<?php
    include("db.php");
    function get_template_by_download($conn, $type){
        $table_name = "templates";
        $sql = "select * from $table_name where type = '$type' order by downloads desc limit 4";
        return mysqli_query($conn,$sql);
    }
    function get_template_by_upload_date($conn, $type){
        $table_name = "templates";
        $sql = "select * from $table_name where type = '$type' order by upload_date desc limit 4";
        return mysqli_query($conn,$sql);
    }
    function get_all_template_by_type($conn, $type){
        $table_name = "templates";
        $sql = "select * from $table_name where type = '$type'";
        return mysqli_query($conn,$sql);
    }

    function get_template_by_type_with_limit($conn, $type, $limit, $offset){
        $table_name = "templates";
        $sql = "select * from $table_name where type = '$type' limit $limit offset $offset";
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

    function display($title,$description){
            echo("<div class='col-6'>
                        <div class='card shadow'>
                            <div class='card-header'>
                                <h5>$title</h5>
                        </div>
                        <div class='card-body'>
                            <div class='image-holder'>
                    
                            </div>
                            <div class='description'>
                                <p>$description</p>
                            </div>
                        </div>
                        <div class='card-footer'>
                            <button class='btn btn-success'>
                                <a class='item' href='powerpoint-preview.php?name=$title'><i class='fas fa-eye pr-1'></i>Preview</a>
                            </button>
                            <button class='btn btn-success float-right' data-toggle='modal' data-target='#download-modal' >
                                <a class='item'><i class='fas fa-download pr-1'></i>Download</a>
                            </button>
                        </div>
                    </div>
                </div>");
    }