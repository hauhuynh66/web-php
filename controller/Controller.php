<?php
require_once("utils.php");
class Controller
{
    private $user;
    private $template;
    private $review;
    private $url;
    private $method;
    private $param;

    public function __construct($user,$template,$review){
        $this->template = $template;
        $this->user = $user;
        $this->review = $review;
    }

    public function get($url,$param=""){
        $this->url = $url;
        $this->param = $param;
        $this->method = "GET";
        $this->control();
    }

    public function post($url,$param=""){
        $this->url = $url;
        $this->param = $param;
        $this->method = "POST";
        $this->control();
    }

    public function control(){
        if($this->url=="/"&&$this->method=="GET"){
            $this->index();
        }
        if($this->url=="login"&&$this->method="GET"){
            $this->login();
        }
        if($this->url=="authenticate"&&$this->method="POST"){
            $this->authenticate();
        }
        if($this->url=="logout"&&$this->method=="GET"){
            $this->logout();
        }
        if($this->url=="users"&&$this->method=="GET"){
            $this->getUsers();
        }
        if($this->url=="powerpoint"&&$this->method=="GET"){
            $this->powerpoint($this->param);
        }
        if($this->url=="web"&&$this->method=="GET"){
            $this->web($this->param);
        }
        if($this->url=="upload"&&$this->param=="index"){
            $this->uploadForm();
        }
        if($this->url=="about"&&$this->method=="GET"){
            $this->about();
        }
        if($this->url=="profile"&&$this->param=="index"){
            $this->profile();
        }
        if($this->url=="profile"&&$this->param=="update"){
            $this->updateProfile();
        }
        if($this->url[0]=="profile"&&$this->url[1]="get"){
            $this->getProfile($this->param);
        }
        if($this->url=="lang"&&$this->method=="POST"){
            $this->changeLanguage($this->param);
        }
        if($this->url=="api_call"&&$this->method=="POST"){
            $this->apiCall($this->param);
        }
        if($this->url=="download"&&$this->method=="GET"){
            $this->download($this->param);
        }
        if($this->url=="404"){
            $this->notFound();
        }
        if($this->url=="403"&&$_SERVER["REQUEST_METHOD"]=="GET"){
            $this->forbidden();
        }
        if($this->url=="web-preview"){
            $this->webPreview($this->param);
        }
        if($this->url=="ppt-preview"){
            $this->pptPreview($this->param);
        }
        if($this->url=="review/add"){
            $this->addReview();
        }
        if($this->url=="template"&&$this->param=="upload"){
            $this->upload();
        }
        if($this->url=="list"){
            $this->getList($this->param);
        }
        if($this->url[0]=="template"&&$this->url[1]=="edit"&&$_SERVER["REQUEST_METHOD"]=="POST"){
            $this->editTemplate($this->param);
        }
        if($this->url[0]=="template"&&$this->url[1]=="info"){
            $this->templateInfo($this->param);
        }
        if($this->url[0]=="search"){
            $type = explode("&",$this->param,3);
            $this->searchTemplate($type[0],$type[1]);
        }
        if($this->url=="templates"){
            $this->getTemplateList();
        }
        if($this->url=="register"){
            require_once("template/register.php");
        }
        if($this->url[0]=="register"&&$this->url[1]=="add"){
            $this->register();
        }
        if($this->url[0]=="delete"&&$this->url[1]=="template"){
            $this->deleteTemplate($this->param);
        }
        if($this->url=="password"){
            require_once("template/password.php");
        }else if($this->url[0]=="password"&&$this->url[1]=="change"){
            require_once ("controller/mail.php");
            require_once ("controller/utils.php");
            require_once ("model/user.php");
            if (isset($_POST["send"]))
            {
                $email = $_POST["email"];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    header("Location:../template/password-forget.php?error");
                }

                else{
                    $u = $user->getByEmail($email)->fetch_assoc();
                    if ($user == null) {
                        header("Location:../template/password-forget.php?badCredential");
                    } else {
                        $success = $user->updatePassword($u["username"], generate_string(10));
                        if (!$success) {
                            header("Location:../template/password-forget.php?failed");
                        } else {
                            $success = sendMail($email, $success);
                            if ($success == 1) {
                                header("Location:../template/login.php?reset");
                            } else {
                                header("Location:../template/password-forget.php?failed");
                            }
                        }
                    }
                }
            }
        }
    }

public static function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public function deleteTemplate($name){
        $t = $this->template->getByName($name);
        if($t->num_rows>0){
            $type=$t->fetch_assoc()["type"];
            $success = $this->template->delete($name);
            if($success){
                $src_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/file/".$type."/".$name."/";
                $img_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/image/preview/".$type."/".$name."/";
                self::deleteDir($img_path);
                self::deleteDir($src_path);
                echo "OK";
            }else{
                echo "FALSE";
            }
        }else{
            return "FALSE";
        }
    }

    public function register(){
        if (isset($_POST["register"])) {
            $f_name = $_POST["first-name"];
            $l_name = $_POST["last-name"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $validate = $this->validate($f_name, $l_name, $username, $email, $password);
            if ($validate!="OK")
            {
                $this->redirect("/register?error=$validate");
            }

            else{
                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                $result = $this->user->getByUsernameAndEmail($username, $email);
                if ($result->num_rows == 0) {
                    $success = $this->user->insert($f_name, $l_name, $username, $email, $hash_password);
                    if ($success) {
                        $this->redirect("/login?success");
                    } else {
                        $err = "Unexpected Error";
                        $this->redirect("/register?error=$err");
                    }
                }
            }
        }
    }


    private function validate($f_name, $l_name, $username, $email, $password)
    {
        if (empty($f_name)) {
            $message = "First name is required";
        } else if (strlen($f_name) < 2 || strlen($f_name) > 40) {
            $message = "First name must have 2-40 characters";
        } else if (empty($l_name)) {
            $message = "Last name is required";
        } else if (strlen($l_name) < 2 || strlen($l_name) > 40) {
            $message = "Last name must have 2-40 characters";
        } else if (empty($username)) {
            $message = "Username is required";
        } else if (strlen($username) < 6 || strlen($username) > 40) {
            $message = "Username must have 6-40 characters";
        } else if (empty($email)) {
            $message = "Email is required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Email is not valid";
        } else if (empty($password)) {
            $message = "Password is required";
        } else if (strlen($password) < 6 || strlen($password) > 100) {
            $message = "Password must have 6-100 character";
        } else {
            $message = "OK";
        }
        return $message;
    }



    public function getTemplateList(){
        $role = $this->guard();
        $l = $this->lang();
        $result = $this->template->getAll();
        $template_list = array();
        while($r = $result->fetch_assoc()){
            $r["uploader"] = $this->user->getById($r["uploader"])->fetch_assoc()["username"];
            array_push($template_list,$r);
        }
        require_once("template/template.php");
    }

    public function searchTemplate($type,$str){
        $role = $this->guard();
        $l = $this->lang();
        if($type=="ppt"){
            $type="powerpoint";
        }
        $result = $this->template->searchByNameAndType($type,$str);
        $template_list = array();
        while ($r = $result->fetch_assoc()){
            array_push($template_list,$r);
        }
        require_once ("template/list.php");
    }

    public function templateInfo($name){
        $role = $this->guard();
        $t = $this->template->getByName($name);
        $result = $t->fetch_assoc();
        $result["uploader"] = $this->user->getById($result["uploader"])->fetch_assoc()["username"];
        echo json_encode($result);
    }

    public function editTemplate($tname){
        $function = $_POST["function"];
        if($function=="edit_info"){
            $nname = $_POST["name"];
            $description = $_POST["description"];
            $type = $this->template->getByName($tname)->fetch_assoc()["type"];
            $success = $this->template->updateInfo($tname,$nname,$description);
            if($success){
                if($nname!=$tname){
                    $src_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/file/".$type."/";
                    $img_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/image/preview/".$type."/";
                    rename($src_path.$tname,$src_path.$nname);
                    rename($img_path.$tname,$img_path.$nname);
                }
                echo "SUCCESS-".$type;
            }else{
                echo "FAILED";
            }
        }elseif ($function=="add_image"){
            $name = $_POST["tpname"];
            $type = $this->template->getByName($name)->fetch_assoc()["type"];
            $img_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/image/preview/".$type."/".$name."/";
            if(!is_dir($img_path)){
                echo "FALSE";
            }else{
                $ext = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
                $img = $_FILES["file"]["tmp_name"];
                $files = count_file($img_path,array("*.jpg"));
                $j = $files+1;
                $ext = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
                $img = $_FILES["file"]["tmp_name"];
                $img_des = $img_path."/img".$j.".".$ext;
                move_uploaded_file($img,$img_des);
                echo "OK";
            }
        }
    }

    public function getProfile($username){
        $role = $this->guard();
        $exist = $this->user->getByUsername($username);
        if($exist->num_rows>0){
            $user = $exist->fetch_assoc();
            $role = $this->user->getRole($username);
            $n = $this->template->getByUploader($username)->num_rows;
            $u = array("username"=>$user["username"],"firstname"=>$user["firstname"],"lastname"=>$user["lastname"],"email"=>$user["email"],
                    "facebook"=>$user["facebook"],"twitter"=>$user["twitter"],"github"=>$user["github"],
                    "date"=>$user["join_date"],"picture"=>$user["picture"],"role"=>$role,"uploaded"=>$n);
            echo json_encode($u);
        }else{
            echo "NOT FOUND";
        }
    }


    private function redirect($url){
        header("Location:/assignment".$url);
    }

    private function validate_info($fname,$lname,$username,$email){
        $error = "NONE";
        if(strlen($fname)<3){
            $error = "First name must have more than 4 character";
        }else if(strlen($lname)<3){
            $error = "Last name must have more than 4 character";
        }else if(strlen($username)<6){
            $error = "Username must have more than 6 character";
        }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error = "Email not valid";
        }
        return $error;
    }

    public function updateProfile(){
        $type = $_POST["function"];
        if($type=="image_update"){
            $id = $_POST["i"];
            $username = $_POST["un"];
            $success = $this->user->updateImage($username,$id);
            if($success){
                echo "OK";
            }else{
                echo "FAIL";
            }
        }else if ($type=="password_update"){
            $username = $_SESSION["username"];
            $op = $_POST["op"];
            $np = $_POST["np"];
            $exist = $this->user->getByUsername($username);
            $u = $exist->fetch_assoc();
            if($u!=null){
                if(password_verify($op,$u["password"])){
                    if(strlen($np)<8){
                        echo "FAILED";
                    }else{
                        $success = $this->user->updatePassword($username,$np);
                        if($success){
                            echo "SUCCESS";
                        }else{
                            echo "FAILED";
                        }
                    }
                }else{
                    echo "WRONG PASSWORD";
                }
            }else{
                echo "NOT FOUND";
            }
        }else if($type=="update_info"){
            $exist = $this->user->getByUsername($_SESSION["username"])->fetch_assoc();
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $github = $_POST["github"];
            $facebook = $_POST["facebook"];
            $twitter = $_POST["twitter"];
            if($exist!=null){
                $id = $exist["id"];
                $error = $this->validate_info($fname,$lname,$username,$email);
                if($error=="NONE"){
                    $success = $this->user->updateInformation($id,$fname,$lname,$username,$email,$github,$facebook,$twitter);
                    if($success){
                        $_SESSION["username"] = $username;
                        echo "SUCCESS";
                    }else{
                        echo "FAILED";
                    }
                }else{
                    echo $error;
                }
            }else{
                echo "NOT FOUND";
            }
        }else if($type=="ban"){
            $username = $_POST["username"];
            $success = $this->user->ban($username);
            if($success){
                echo "OK";
            }else{
                echo "FAIL";
            }
        }else if($type=="unban"){
            $username = $_POST["username"];
            $success = $this->user->unban($username);
            if($success){
                echo "OK";
            }else{
                echo "FAIL";
            }
        }
    }

    public function getList($str){
        $role = $this->guard();
        $l = $this->lang();
        $exist = $this->user->getByUsername($str);
        if($exist->num_rows==0){
            $this->redirect("/404");
        }else{
            $result = $this->template->getByUploader($str);
            $template_list = array();
            while ($t = $result->fetch_assoc()){
                array_push($template_list,$t);
            }
            require_once("template/list.php");
        }
    }

    public function upload(){
        $this->guard();
        $f = $_FILES["file"]["tmp_name"];
        $n = sizeof($_FILES["image"]["name"]);
        if(isset($_POST["name"])){
            $name = $_POST["name"];
            if(strlen($name)<6||strlen($name)>200){
                header("Location:/assignment/upload?error=name");
            }
        }else{
            header("Location:/assignment/upload?error=name");
        }
        $type = strtolower($_POST["type"]);
        $exist = $this->template->getByNameAndType($name,$type);
        if($exist->num_rows>0){
            header("Location:/assignment/upload?error=existed");
        }
        $des = $_POST["description"];
        $uploader = $_SESSION["username"];
        $success = $this->template->upload($name,$type,$uploader,$des);
        if($success==false){
            header("Location:/assignment/upload/upload?failed");
        }else{
            $src_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/file/".$type."/".$name;
            $img_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/image/preview/".$type."/".$name;
            if(!is_dir($src_path)){
                mkdir($src_path);
            }
            if(!is_dir($img_path)){
                mkdir($img_path);
            }
            for($i=0;$i<$n;$i++){
                $j = $i+1;
                $ext = pathinfo($_FILES["image"]["name"][$i],PATHINFO_EXTENSION);
                $img = $_FILES["image"]["tmp_name"][$i];
                $img_des = $img_path."/img".$j.".".$ext;
                move_uploaded_file($img,$img_des);
            }
            $src_des = $src_path."/src.zip";
            move_uploaded_file($f,$src_des);
            header("Location:/assignment/upload?success");
        }
    }

    public function addReview(){
        $this->guard();
        $t = $_POST["template"];
        $username = $_SESSION["username"];
        $star = $_POST["rating"];
        $content = $_POST["comment"];
        $success = $this->review->insert($t,$username,$star,$content);
        if($success){
            echo "OK";
        }else{
            echo "FAILED";
        }
    }

    public function webPreview($name){
        $role = $this->guard();
        $l = $this->lang();
        $result = $this->template->getByNameAndType($name,"web")->fetch_assoc();
        if($result==null){
            header("Location:/assignment/404");
        }
        $downloads = $result["downloads"];
        $name = $result["name"];
        $des = $result["description"];
        $relative_path = "/assignment/image/preview/".$result["type"]."/".$result["name"]."/";
        $absolute_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/image/preview/".$result["type"]."/".$result["name"]."/";
        $uploader = $this->user->getById($result["uploader"])->fetch_assoc()["username"];
        if($uploader==$_SESSION["username"]){
            $editable = true;
        }else{
            $editable = false;
        }
        $upload_date = $result["upload_date"];
        $reviews = $this->review->getAll($result["name"]);
        $review_list = array();
        while ($row = $reviews->fetch_assoc()){
            array_push($review_list,$row);
        }
        $n = mysqli_num_rows($reviews);
        $count = count_file($absolute_path,["*.jpg"]);
        require_once("template/web-preview.php");
    }

    public function pptPreview($name){
        $role = $this->guard();
        $l = $this->lang();
        $result = $this->template->getByNameAndType($name,"powerpoint")->fetch_assoc();
        if($result==null){
            header("Location:/assignment/404");
        }
        $downloads = $result["downloads"];
        $name = $result["name"];
        $des = $result["description"];
        $relative_path = "/assignment/image/preview/".$result["type"]."/".$result["name"]."/";
        $absolute_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/image/preview/".$result["type"]."/".$result["name"]."/";
        $uploader = $this->user->getById($result["uploader"])->fetch_assoc()["username"];
        if($uploader==$_SESSION["username"]){
            $editable = true;
        }else{
            $editable = false;
        }
        $upload_date = $result["upload_date"];
        $reviews = $this->review->getAll($result["name"]);
        $review_list = array();
        while ($row = $reviews->fetch_assoc()){
            array_push($review_list,$row);
        }
        $n = mysqli_num_rows($reviews);
        $count = count_file($absolute_path,["*.jpg"]);
        require_once("template/powerpoint-preview.php");
    }

    public function forbidden(){
        $role = $this->guard();
        $l = $this->lang();
        require_once("template/403.php");
    }

    public function notFound(){
        $role = $this->guard();
        $l = $this->lang();
        require_once("template/404.php");
    }

    public function lang(){
        $locale = new lang();
        return $l = $locale->load();
    }

    public function index(){
        $role = $this->guard();
        $l = $this->lang();
        $templates = $this->template->getAll();
        $n_templates = mysqli_num_rows($templates);
        $download = $this->template->get_total_download();
        $users = mysqli_num_rows($this->user->getAll());
        require_once("template/index.php");
    }

    public function login(){
        require_once("template/login.php");
    }

    public function authenticate(){
        $role = $this->guard();
        $email = $_POST["email"];
        $password = $_POST["password"];
        $n = $this->user->getByEmail($email)->num_rows;
        if($n==0){
            header('Location:../template/login.php?error');
        }else{
            $result = $this->user->getByEmail($email)->fetch_assoc();
            $username = $result["username"];
            $status = $this->user->getStatus($username);
            echo $status;
            if($status!="ACTIVE"){
                header("Location:../assignment/login?blocked");
            }else{
                if(password_verify($password,$result["password"])){
                    $_SESSION['username'] = $result["username"];
                    header('Location:../assignment/');
                }else{
                    header('Location:../assignment/login?error');
                }
            }
        }
    }

    public function logout(){
        if(isset($_SESSION["username"])){
            $success = $this->user->updateTime($_SESSION["username"]);
            if($success){
                unset($_SESSION['username']);
                header('Location:/assignment/login?logout');
            }
        }
    }

    public function getUsers(){
        $role = $this->guard();
        $l = $this->lang();
        if(isset($_SESSION["username"])){
            $role = $this->user->getRole($_SESSION["username"]);
            if($role=="ADMIN"){
                $users = $this->user->getAll();
                $i = 0;
                $list = array();
                while ($u = $users->fetch_assoc()){
                    $i++;
                    $username = $u["username"];
                    $urole = $this->user->getRole($u["username"]);
                    $upload = mysqli_num_rows($this->user->getUploadedTemplates($u["username"]));
                    $status = $this->user->getStatus($u["username"]);
                    $lastest = $this->user->getLastest($u["username"]);
                    array_push($list,array("i"=>$i,"username"=>$username,"role"=>$urole,"upload"=>$upload,"status"=>$status,"lastest"=>$lastest));
                }
                require_once("template/users.php");
            }else{
                header("Location:/assignment/403");
            }
        }
    }

    public function powerpoint($p){
        $role = $this->guard();
        $l = $this->lang();
        $page = substr($p,4,1);
        $mode = substr($p,6,3);
        $n = 2;
        $r = $this->template->getByType("powerpoint")->num_rows;
        $limit = $page*$n;
        $offset = ($page-1)*$n;
        $templates = array();
        $result = $this->template->get("powerpoint",$limit,$offset,$mode);
        $i=0;
        while($row = $result->fetch_assoc()){
            $i++;
            array_push($templates,$row);
        }
        require_once("template/powerpoint.php");
    }

    public function web($p){
        $role = $this->guard();
        $l = $this->lang();
        $page = substr($p,4,1);
        $mode = substr($p,6,3);
        $n = 2;
        $r = $this->template->getByType("web")->num_rows;
        $limit = $page*$n;
        $offset = ($page-1)*$n;
        $templates = array();
        $result = $this->template->get("web",$limit,$offset,$mode);
        $i=0;
        while($row = $result->fetch_assoc()){
            $i++;
            array_push($templates,$row);
        }
        require_once("template/web.php");
    }

    public function uploadForm(){
        $role = $this->guard();
        $l = $this->lang();
        require_once("template/upload.php");
    }

    public function about(){
        $role = $this->guard();
        $l = $this->lang();
        require_once("template/about.php");
    }

    public function profile(){
        $role = $this->guard();
        $l = $this->lang();
        $username = $_SESSION["username"];
        $result = $this->user->getByUsername($username)->fetch_assoc();
        $role = $this->user->getRole($username);
        $firstname = $result["firstname"];
        $lastname = $result["lastname"];
        $username = $result["username"];
        $email = $result["email"];
        $github = $result["github"];
        $facebook = $result["facebook"];
        $twitter = $result["twitter"];
        $uploads = mysqli_num_rows($this->user->getUploadedTemplates($result["username"]));
        $img = "/assignment/static/vendor/icon/animal/".$result["picture"].".svg";
        require_once("template/profile.php");
    }

    public function changeLanguage($lang){
        $l = new lang();
        $l->set($lang);
    }

    public function apiCall($param){
        if($param==1){
            $w = $this->template->getByType("web")->num_rows;
            $p = $this->template->getByType("powerpoint")->num_rows;
            $arr = array("Web"=>$w,"Powerpoint"=>$p);
            echo json_encode($arr);
        }
        if($param==2){
            $arr = array();
            for ($i=6;$i>=0;$i--){
                $v = date("Y:m:d",time()-$i*24*3600);
                $n = $this->user->getByDate($v)->num_rows;
                $arr[$v] = $n;
            }
            echo json_encode($arr);
        }
    }

    public function download($name){
        $result = $this->template->getByName($name)->fetch_assoc();
        if($result==null){
            header("Location:/assignment/404");
        }
        $success = $this->template->download($name);
        if($success){
            $name = $result["name"];
            $type = $result["type"];
            $path = $_SERVER['DOCUMENT_ROOT']."/assignment/file/".$type."/".$name."/src.zip";
            header( 'Cache-Control: public' );
            header( 'Content-Description: File Transfer' );
            header( "Content-Disposition: attachment;" );
            header( 'Content-Type: application/zip' );
            header( 'Content-Transfer-Encoding: binary' );
            readfile($path);
            exit();
        }
    }

    public function guard(){
        if(!isset($_SESSION["username"])){
            header("Location:/assignment/login");
        }
        return $role = $this->user->getRole($_SESSION["username"]);
    }
}