<?php
    require_once("db.php");
    class template{
        private $template_table;
        private $conn;

        /**
         * Template constructor.
         * @param $template_table
         * @param $conn
         */
        public function __construct($conn, $template_table = "templates")
        {
            $this->template_table = $template_table;
            $this->conn = $conn;
        }

        function get_by_name($name,$type){
            $sql = "select * from $this->template_table where name = '$name' and type ='$type'";
            return mysqli_query($this->conn,$sql);
        }

        function get_by_type($type, $limit, $offset, $mode){
            $table_name = "templates";
            if($mode=="dls"){
                $sql = "select * from $table_name where type = '$type' order by downloads desc limit $limit offset $offset";
            }else{
                $sql = "select * from $table_name where type = '$type' order by upload_date desc  limit $limit offset $offset";
            }
            return mysqli_query($this->conn,$sql);
        }

        function get_by_uploader($uploader){
            $sql = "select * from $this->template_table where uploader='$uploader'";
            return mysqli_query($this->conn,$sql);
        }

        function get_all($conn){
            $sql = "select * from $this->template_table";
            return mysqli_query($conn,$sql);
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
    }