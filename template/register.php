<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="/assignment/static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/css/main.css" rel="stylesheet" type="text/css">
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
            <a class="btn btn-danger round"><i class="fab fa-google icon-white"></i></a>
        </div>
        <div class="col-4 text-right pr-0">
            <a class="btn btn-info round"><i class="fab fa-twitter icon-white"></i></a>
        </div>
    </div>
    <div class="text-center mt-4">
        <?php
            if(isset($_GET["error"])){
                echo ("<div class='alert alert-danger'>".$_GET["error"]."</div>");
            }
        ?>
    </div>
    <form class="form-group mt-3" action="/assignment/register/add" method="post">
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
        <button name="register" class="btn btn-block btn-info mt-3" type="submit" id="register">Register</button>
        <a href="/assignment/login" class="d-block mt-3">Already have account? Login</a>
        <a href="/assignment/password" class="d-block mt-3">Forget Password?</a>
    </form>
</div>
</body>
</html>