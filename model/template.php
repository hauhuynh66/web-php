<?php
    require_once("config/database.php");
    class template{
        private $table_name;
        private $conn;

        /**
         * Template constructor.
         * @param $template_table
         * @param $conn
         */
        public function __construct($conn, $template_table = "template")
        {
            $this->table_name = $template_table;
            $this->conn = $conn;
        }

        function getByName($name){
            $sql = "select * from $this->table_name where name = '$name'";
            return mysqli_query($this->conn,$sql);
        }

        function getByNameAndType($name,$type){
            $sql = "select * from $this->table_name where name = '$name' and type= '$type'";
            return mysqli_query($this->conn,$sql);
        }

        function get($type, $limit, $offset, $mode){
            if($mode=="dls"){
                $sql = "select * from $this->table_name where type = '$type' order by downloads desc limit $limit offset $offset";
            }else{
                $sql = "select * from $this->table_name where type = '$type' order by upload_date desc  limit $limit offset $offset";
            }
            return mysqli_query($this->conn,$sql);
        }

        function getByType($type){
            $sql = "select * from $this->table_name where type ='$type'";
            return mysqli_query($this->conn,$sql);
        }

        function getByUploader($uploader){
            $sql = "select template.name, template.downloads,template.type,template.description from users inner join template 
                            on users.id = template.uploader where users.username = '$uploader'";
            return mysqli_query($this->conn,$sql);
        }

        function getAll(){
            $sql = "select * from $this->table_name";
            return mysqli_query($this->conn,$sql);
        }

        function delete($name){
            $sql = "select id from template where name='$name'";
            $id = mysqli_query($this->conn,$sql)->fetch_assoc()["id"];
            $sql = "delete from review where template = $id";
            $success = mysqli_query($this->conn,$sql);
            if($success){
                $sql = "delete from $this->table_name where name = '$name'";
                return mysqli_query($this->conn,$sql);
            }else{
                return false;
            }

        }

        static function render_ppt($result, $i){
            $name = $result["name"];
            $download = $result["downloads"];
            $path = "/assignment/image/preview/".$result["type"]."/".$name."/img1.jpg";
            $description = $result["description"];
            echo("<div class='col-xl-6 col-lg-6 col-mb-6 col-sm-12 pt-3'>
                        <div class='card shadow'>
                            <div class='card-header'>
                                <div class='row'>
                                    <div class='col-6 w-haft'>
                                        <h5 id='tp-name-$i'>$name</h5>
                                    </div>
                                    <div class='col-6 w-haft justify-content-end'>
                                        <small class='text-info'><i class='fa fa-download mr-2'></i> $download</small>
                                    </div>
                                </div>
                        </div>
                        <div class='card-body card-body-fixed'>
                            <img src='$path' alt='?' class='image-holder'>
                            <div class='description text-center'>
                                <p>$description</p>
                            </div>
                        </div>
                        <div class='card-footer text-center'>
                            <a class='btn btn-danger float-left item' href='/assignment/ppt-preview/$name'>
                                <i class='fas fa-eye pr-1'></i>Details
                            </a>
                            <i class='text-center fa fa-book-open fa-2x icon-danger'></i>
                            <a class='btn btn-danger float-right item' data-toggle='modal' data-target='#download-modal' id='download-btn-$i'>
                                <i class='fas fa-download pr-1'></i>Download
                            </a>
                        </div>
                    </div>
                </div>");
        }
        static function render_web($result, $i){
            $name = $result["name"];
            $download = $result["downloads"];
            $path = "/assignment/image/preview/".$result["type"]."/".$name."/img1.jpg";
            $description = $result["description"];
            echo("<div class='col-xl-6 col-lg-6 col-mb-6 col-sm-12 pt-3'>
                        <div class='card shadow'>
                            <div class='card-header'>
                                <div class='row'>
                                    <div class='col-6 w-haft'>
                                        <h5 id='tp-name-$i'>$name</h5>
                                    </div>
                                    <div class='col-6 w-haft justify-content-end'>
                                        <small class='text-info'><i class='fa fa-download mr-2'></i>$download</small>
                                    </div>
                                </div>
                        </div>  
                        <div class='card-body card-body-fixed'>
                            <img src='$path' alt='?' class='image-holder'>
                            <div class='description text-center'>
                                <p>$description</p>
                            </div>
                        </div>
                        <div class='card-footer text-center'>
                            <a class='btn btn-success float-left item' href='/assignment/web-preview/$name'>
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

        function upload($name, $type, $uploader, $des){
            $uploader = mysqli_query($this->conn,"select id from users where username = '$uploader'")->fetch_assoc()["id"];
            $sql = "insert into $this->table_name( name, type, uploader , description) values ('$name','$type','$uploader','$des')";
            return mysqli_query($this->conn,$sql);
        }

        function download($name){
            $exist = $this->getByName($name)->fetch_assoc();
            if($exist==null){
                return false;
            }else{
                $dl = $exist["downloads"];
                $dl++;
                $sql = "update $this->table_name set downloads = '$dl' where name='$name'";
                return mysqli_query($this->conn,$sql);
            }
        }

        function get_total_download(){
            $templates = $this->getAll();
            $count = 0;
            while ($template = $templates->fetch_assoc()){
                $count+=$template["downloads"];
            }
            return $count;
        }

        function get_by_date($date){
            $sql = "select * from $this->table_name where upload_date = '$date'";
            return mysqli_query($this->conn, $sql);
        }

        function updateInfo($name,$newname,$newdes){
            $sql = "update $this->table_name set name = '$newname', description = '$newdes' where name = '$name'";
            return mysqli_query($this->conn,$sql);
        }

        function searchByNameAndType($type,$str){
            $sql = "select * from $this->table_name where name like '%$str%' and type = '$type'";
            return mysqli_query($this->conn,$sql);
        }
    }
    $template = new template($conn);