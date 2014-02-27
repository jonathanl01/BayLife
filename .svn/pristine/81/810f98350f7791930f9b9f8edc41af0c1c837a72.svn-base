<!--
    Author: Jianjun Li
    Description: Login Page
-->
<!DOCTYPE html>
<html>
    <head>
        <!--Include these two links for the navbar to work-->
        <link rel="stylesheet" type="text/css" href="header.css" >
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
        <title>Login Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            login {text-align:center}
        </style>
    </head>
    <body>
       <?php
         require_once('navbar.php');
       ?>
        <div class="login">
            <form class="form-signin" name="login_form">
                <input type="hidden">
                <h2 class="form-signin-heading">Log In</h2>
                <p>
                    <label>User Name</label>
                    <input type="text" class="form-control" maxlength="16" name="username" autofocus>
                </p>

                <p>
                    <label>Password</label>
                    <input type="password" class="form-control" maxlength="20" name="password">
                    <button id="login_btn" class="btn btn-lg btn-primary btn-block">Submit</button>
                </p>
            </form>
            <button class="btn btn-default" onclick="window.location = 'registration.php';">Sign Up</button>
            <div class="forgot_statements">
                <p><a href="forgot_password.php">Forgot your password?</a></p>
                <p><a href="forgot_user_name.php">Forgot your user name?</a></p>
            </div>
        </div>
    </body>
</html>