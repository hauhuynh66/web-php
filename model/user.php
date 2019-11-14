<?php
    require_once("../config/database.php");
    require_once("../controller/utils.php");
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

        function get_by_username($username){
            $sql = "select * from $this->user_table where username = '$username'";
            return mysqli_query($this->conn,$sql);
        }

        function get_all(){
            $sql = "select * from $this->user_table";
            return mysqli_query($this->conn,$sql);
        }

        function get_by_email($email){
            $sql = "select * from $this->user_table where email='$email'";
            return mysqli_query($this->conn,$sql);
        }

        function get_by_username_and_password($username,$password){

        }

        function get_by_username_and_email($username,$email){
            $sql = "select * from $this->user_table where username='$username' and email = '$email' limit 1";
            return mysqli_query($this->conn,$sql);
        }

        function insert($f_name, $l_name, $username, $email, $hash_password){
            $sql = "insert into $this->user_table(firstname,lastname,username,email,password) values ('$f_name','$l_name','$username','$email','$hash_password')";
            return mysqli_query($this->conn,$sql);
        }

        function get_role($username,$col){
            $existed = $this->get_by_username($username);
            if($existed->num_rows==0){
                return 0;
            }else{
                $sql = "select * from $this->role_table where username='$username'";
                $success = mysqli_query($this->conn,$sql);
                if($success){
                    return $success->fetch_assoc()[$col];
                }else{
                    return null;
                }
            }
        }

        function get_uploaded_templates($username){
            $existed = mysqli_num_rows($this->get_by_username($username));
            if($existed==0){
                return 0;
            }else{
                $sql = "select * from templates where uploader = '$username'";
                return mysqli_query($this->conn,$sql);
            }
        }

        function update_active_time($username){
            $user = $this->get_by_username($username);
            if($user==null){
                die();
            }else{
                $role_id = $this->get_role($username,"id");
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date("Y-m-d H:i:s");
                $sql = "update $this->role_table set lastest='$date' where id='$role_id'";
                return mysqli_query($this->conn,$sql);
            }
        }

        function insert_role($username){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d H:i:s");
            $sql = "insert into role( username, role, status, lastest) values ('$username','USER','ACTIVE','$date')";
            return mysqli_query($this->conn,$sql);
        }

        function update_image($username,$i){
            $existed = $this->get_by_username($username);
            if($existed){
                $id = $existed->fetch_assoc()["id"];
                $sql ="update $this->user_table set picture='$i' where id='$id'";
                return mysqli_query($this->conn,$sql);
            }else{
                return false;
            }
        }

        function change_password($username,$password){
            $id = $username["id"];
            $raw_password = $password;
            $hash_password = password_hash($raw_password,PASSWORD_DEFAULT);
            $sql = "update $this->user_table set password = '$hash_password' where id = '$id'";
            return mysqli_query($this->conn,$sql);
        }

        function ban($username){
            $exist = $this->get_by_username($username);
            if($exist->num_rows==0){
                return false;
            }else{
                $id = $this->get_role($username,"id");
                $role = $this->get_role($username,"role");
                if($role=="USER"){
                    if($id){
                        $sql = "update $this->role_table set status = 'BANNED' where id='$id'";
                        return mysqli_query($this->conn,$sql);
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        }

        function unban($username){
            $exist = $this->get_by_username($username);
            if($exist->num_rows==0){
                return false;
            }else{
                $id = $this->get_role($username,"id");
                if($id){
                    $sql = "update $this->role_table set status = 'ACTIVE' where id='$id'";
                    return mysqli_query($this->conn,$sql);
                }else{
                    return false;
                }

            }
        }

        function upgrade($username){

        }

        function get_by_date($date){
            $sql = "select * from $this->user_table where join_date = '$date'";
            return mysqli_query($this->conn,$sql);
        }
    }
    $user = new user($conn);
