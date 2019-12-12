<?php
    require_once("config/database.php");
    require_once("controller/utils.php");
    class user{
        private $user_table;
        private $role_table;
        private $conn;

        /**
         * User constructor.
         * @param $conn
         * @param string $table_name
         * @param string $role_table
         */
        public function __construct($conn,$table_name = "users",$role_table = "role")
        {
            $this->user_table = $table_name;
            $this->role_table = $role_table;
            $this->conn = $conn;
        }

        function getByUsername($username){
            $sql = "select * from $this->user_table where username = '$username'";
            return mysqli_query($this->conn,$sql);
        }

        function getById($id){
            $sql = "select * from $this->user_table where id = '$id'";
            return mysqli_query($this->conn,$sql);
        }

        function getAll(){
            $sql = "select * from $this->user_table";
            return mysqli_query($this->conn,$sql);
        }

        function getByEmail($email){
            $sql = "select * from $this->user_table where email='$email'";
            return mysqli_query($this->conn,$sql);
        }

        function getByUsernameAndEmail($username, $email){
            $sql = "select * from $this->user_table where username='$username' and email = '$email' limit 1";
            return mysqli_query($this->conn,$sql);
        }

        function insert($f_name, $l_name, $username, $email, $hash_password){
            $sql = "insert into $this->user_table(firstname,lastname,username,email,password,picture) values ('$f_name','$l_name','$username','$email','$hash_password','001')";
            $success = mysqli_query($this->conn,$sql);
            if($success){
                $id = $this->getByUsername($username)->fetch_assoc()["id"];
                $sql = "insert into $this->role_table(user,status,role) values ('$id','ACTIVE','USER')";
                $success = mysqli_query($this->conn,$sql);
                if($success){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        function getRole($username){
            $sql = "select role.role from users inner join role on users.id = role.user where username = '$username'";
            return mysqli_query($this->conn,$sql)->fetch_assoc()["role"];
        }

        function getStatus($username){
            $sql = "select role.status from users inner join role on users.id = role.user where username = '$username'";
            return mysqli_query($this->conn,$sql)->fetch_assoc()["status"];
        }

        function getLastest($username){
            $sql = "select role.lastest from users inner join role on users.id = role.user where username = '$username'";
            return mysqli_query($this->conn,$sql)->fetch_assoc()["lastest"];
        }

        function getUploadedTemplates($username){
            $existed = mysqli_num_rows($this->getByUsername($username));
            if($existed==0){
                return 0;
            }else{
                $sql = "select * from users inner join template 
                            on users.id = template.uploader where users.username = '$username'";
                return mysqli_query($this->conn,$sql);
            }
        }

        function updateTime($username){
            $user = $this->getByUsername($username);
            if($user==null){
                die();
            }else{
                $id = $this->getByUsername($username)->fetch_assoc()["id"];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date("Y-m-d H:i:s");
                $sql = "update $this->role_table set lastest='$date' where user ='$id'";
                return mysqli_query($this->conn,$sql);
            }
        }

        function insert_role($username){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d H:i:s");
            $sql = "insert into role( username, role, status, lastest) values ('$username','USER','ACTIVE','$date')";
            return mysqli_query($this->conn,$sql);
        }

        function updateImage($username, $i){
            $existed = $this->getByUsername($username);
            if($existed){
                $sql ="update $this->user_table set picture='$i' where username='$username'";
                return mysqli_query($this->conn,$sql);
            }else{
                return false;
            }
        }

        function updatePassword($username, $password){
            $raw_password = $password;
            $hash_password = password_hash($raw_password,PASSWORD_DEFAULT);
            $sql = "update $this->user_table set password = '$hash_password' where username = '$username'";
            return mysqli_query($this->conn,$sql);
        }

        function ban($username){
            $exist = $this->getByUsername($username);
            if($exist->num_rows==0){
                return false;
            }else{
                $role = $this->getRole($username);
                if($role=="USER"){
                    $id = $exist->fetch_assoc()["id"];
                    $sql = "update $this->role_table set status = 'BANNED' where user = '$id'";
                    return mysqli_query($this->conn,$sql);
                }else{
                    return false;
                }
            }
        }

        function unban($username){
            $exist = $this->getByUsername($username);
            if($exist->num_rows==0){
                return false;
            }else{
                $role = $this->getRole($username);
                if($role=="USER"){
                    $id = $exist->fetch_assoc()["id"];
                    $sql = "update $this->role_table set status = 'ACTIVE' where user='$id'";
                    return mysqli_query($this->conn,$sql);
                }else{
                    return false;
                }
            }
        }

        function updateInformation($id, $fname, $lname, $username, $email,$github,$facebook,$twitter){
            $sql = "update $this->user_table set firstname = '$fname', lastname = '$lname',username = '$username', 
                    email = '$email', github='$github', facebook = '$facebook', twitter = '$twitter' where id = '$id'";
            return mysqli_query($this->conn,$sql);
        }

        function getByDate($date){
            $sql = "select * from $this->user_table where join_date = '$date'";
            return mysqli_query($this->conn,$sql);
        }
    }
    $user = new user($conn);
