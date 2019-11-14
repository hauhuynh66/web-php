<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="../static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../static/css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-primary">
<div class="limiter bg-light shadow">
    <div class="container text-center">
        <h1 class="text-font-1">Register</h1>
    </div>
    <div class="row mt-4">
        <div class="col-4 pr-0">
            <a class="btn btn-info round"><i class="fab fa-facebook icon-white"></i></a>
        </div>
        <div class="col-4 text-center pr-0">
            <a class="btn btn-danger round"><i class="fab fa-google"></i></a>
        </div>
        <div class="col-4 text-right pr-0">
            <a class="btn btn-info round"><i class="fab fa-twitter icon-white"></i></a>
        </div>
    </div>
    <div class="text-center mt-4">
        <?php
            require_once("../model/user.php");
            function validate($f_name,$l_name,$username,$email,$password)
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
                } else if(empty($email)){
                    $message = "Email is required";
                } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $message = "Email is not valid";
                } else if(empty($password)){
                    $message = "Password is required";
                } else if(strlen($password)<6||strlen($password)>100){
                    $message = "Password must have 6-100 character";
                } else{
                    $message = "OK";
                }
                return $message;
            }
            if(isset($_POST["submit"])){
                $table_name = "users";
                $f_name = $_POST["first-name"];
                $l_name = $_POST["last-name"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $validate = validate($f_name,$l_name,$username,$email,$password);
                if($validate!="OK"){
                    echo("<div class='alert alert-danger'>".$validate."</div>");
                }else{
                    $hash_password = password_hash($password,PASSWORD_DEFAULT);
                    $result = $user->get_by_username_and_email($username,$email);
                    if($result->num_rows==0){
                        $success = $user->insert($f_name,$l_name,$username,$email,$hash_password);
                        if($success){
                            $success = $user->insert_role($username);
                            if($success){
                                header("Location:./login.php?registered");
                            }
                        }
                    }
                }
            }
        ?>
    </div>
    <form class="form-group mt-3" action="./register.php" method="post">
        <div class="row">
            <div class="col-6 pr-0">
                <label for="first-name">First name</label>
                <input class="form-control" name="first-name" type="text" id="first-name">
            </div>
            <div class="col-6 pr-0">
                <label for="last-name">Last name</label>
                <input class="form-control" name="last-name" type="text" id="last-name">
            </div>
        </div>
        <label for="username" class="mt-3">Username</label>
        <input class="form-control" name="username" type="text" id="username">
        <label for="email" class="mt-3">Email</label>
        <input class="form-control" name="email" type="email" id="email">
        <label for="password" class="mt-3">Password</label>
        <input class="form-control" name="password" type="password" id="password">
        <button name="submit" class="btn btn-block btn-info mt-3" type="submit" id="login-btn">Register</button>
        <a href="login.php" class="d-block mt-3">Already have account? Login</a>
        <a href="password-forget.php" class="d-block mt-3">Forget Password?</a>
    </form>
</div>
</body>
</html>