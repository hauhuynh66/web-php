<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="../static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../static/css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-primary">
    <div class="limiter bg-light shadow">
        <div class="container text-center">
            <h1 class="text-font-1">Login</h1>
        </div>
        <div class="text-center mt-3">
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
                    echo("<div class='alert alert-danger errorMsg'>Successfully reset password</div>");
                }
            ?>
        </div>
        <form class="form-group mt-3" action="../controller/authenticate.php" method="post">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email">
            <label for="password" class="mt-3">Password</label>
            <input class="form-control" type="password" name="password" id="password">
            <button class="btn btn-block btn-info mt-5" type="submit" id="login-btn">Sign In</button>
            <a href="password-forget.php" class="d-block mt-3">Forget Password?</a>
            <a href="register.php" class="d-block mt-3">Register Account</a>
        </form>
    </div>
</body>
</html>