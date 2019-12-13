<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="/assignment/static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-primary">
    <div class="limiter bg-light shadow">
        <div class="container text-center">
            <h1 class="text-font-1">Login</h1>
        </div>
        <div class="row mt-4">
            <div class="col-4 pr-0">
                <a class="btn btn-info round"><i class="fab fa-facebook icon-white"></i></a>
            </div>
            <div class="col-4 text-center pr-0">
                <a class="btn btn-danger round"><i class="fab fa-google icon-white"></i></a>
            </div>
            <div class="col-4 text-right pr-0">
                <a class="btn btn-info round"><i class="fab fa-twitter icon-white"></i></a>
            </div>
        </div>
        <div class="text-center mt-4">
            <?php
                if(isset($_GET["registered"])){
                    echo("<div class='alert alert-success errorMsg'>Successfully Register</div>");
                }
                if(isset($_GET["error"])){
                    echo("<div class='alert alert-danger errorMsg'>Bad Credentials</div>");
                }
                if(isset($_GET["blocked"])){
                    echo("<div class='alert alert-danger errorMsg'>User Blocked</div>");
                }
                if(isset($_GET["reset"])){
                    echo("<div class='alert alert-success errorMsg'>Successfully Reset Password</div>");
                }
                if(isset($_GET["logout"])){
                    echo("<div class='alert alert-success errorMsg'>Successfully Logout</div>");
                }
            ?>
        </div>
        <form class="form-group mt-3" action="/assignment/authenticate" method="post">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email">
            <label for="password" class="mt-3">Password</label>
            <input class="form-control" type="password" name="password" id="password">
            <button class="btn btn-block btn-info mt-5" type="submit" id="login-btn">Sign In</button>
            <a href="/assignment/password" class="d-block mt-3">Forget Password?</a>
            <a href="/assignment/register" class="d-block mt-3">Register Account</a>
        </form>
    </div>
</body>
</html>