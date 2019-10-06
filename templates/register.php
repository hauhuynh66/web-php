<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-primary">
<div class="limiter bg-light shadow">
    <div class="container text-center">
        <h4>Register</h4>
    </div>
    <form class="form-group mt-5" action="../php-script/register.php" method="post">
        <div class="row">
            <div class="col-6">
                <label for="first-name">First name</label>
                <input class="form-control" name="first-name" type="text" id="first-name">
            </div>
            <div class="col-6">
                <label for="last-name">Last name</label>
                <input class="form-control" name="last-name" type="text" id="last-name">
            </div>
        </div>
        <label for="email" class="mt-3">Username</label>
        <input class="form-control" name="username" type="text" id="username">
        <label for="email" class="mt-3">Email</label>
        <input class="form-control" name="email" type="email" id="email">
        <label for="password" class="mt-3">Password</label>
        <input class="form-control" name="password" type="password" id="password">
        <button class="btn btn-block btn-info mt-3" type="submit" id="login-btn">Register</button>
        <a href="login.php" class="d-block mt-3">Already have account? Login</a>
    </form>
</div>
</body>
</html>