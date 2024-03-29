
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="/assignment/static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-primary">
<div class="limiter bg-light shadow">
    <div class="container text-center">
        <h1 class="text-font-1">Reset Password</h1>
        <h5 class="mt-3 text-info">Please enter your email to receive new generated password</h5>
    </div>
    <?php
        if(isset($_GET["error"])){
            echo("<div class='alert alert-danger text-center mt-3 errorMsg'>Wrong Email Format</div>");
        }
        if(isset($_GET["badCredential"])){
            echo("<div class='alert alert-danger text-center mt-3 errorMsg'>Email have not yet been registered</div>");
        }
        if(isset($_GET["failed"])){
            echo("<div class='alert alert-danger text-center mt-3 errorMsg'>Unexpected error. Please try a gain</div>");
        }
    ?>
    <form class="form-group mt-3" action="/assignment/password/change" method="post">
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" id="email">
        <button class="btn btn-block btn-info mt-3" type="submit" id="send-btn" name="send">Send Email</button>
        <a href="/assignment/login" class="d-block mt-3">Login</a>
    </form>
</div>
</body>
</html>