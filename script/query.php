<?php
    include("db.php");
    function query_by_download($conn,$type){
        $table_name = "templates";
        $sql = "select * from $table_name where type = '$type' order by downloads desc limit 4";
        return mysqli_query($conn,$sql);
    }
    function query_by_date($conn,$type){
        $table_name = "templates";
        $sql = "select * from $table_name where type = '$type' order by upload_date desc limit 4";
        return mysqli_query($conn,$sql);
    }
    function getAllByType($conn,$type){
        $table_name = "templates";
        $sql = "select * from $table_name where type = '$type'";
        return mysqli_query($conn,$sql);
    }

    function getByTypeWithLimit($conn,$type,$limit,$offset){
        $table_name = "templates";
        $sql = "select * from $table_name where type = '$type' limit $limit offset $offset";
        return mysqli_query($conn,$sql);
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
                            <button class='btn btn-success float-right'>
                                <a class='item' href='./download.php?name=$title'><i class='fas fa-download pr-1'></i>Download</a>
                            </button>
                        </div>
                    </div>
                </div>");
    }