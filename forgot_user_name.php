<!--
    Author: Jianjun Li
    Description: Password Reset
-->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/forgot_page.css">
        <title>Forgot User Name</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            login {text-align:center}
        </style>
    </head>
    <body>
       <?php
         require_once('navbar.php');
       ?>
            <div class="password-page">
                <form class="form-reset" name="password-reset-form">
                    <h2 class="form-reset-heading">User Name Retrieve</h2>
                    <p>
                        <label>Email</label>
                        <input type="email" class="form-control" maxlength="20" name="email">
                    </p>
                    <p>
                        <button class="btn btn-lg btn-primary btn-block">Submit</button>
                    </p>
                </form>
                <button class="btn btn-default" onclick="window.location = 'login.php';">Remember your user name? Click here!</button>
                <p><br><a href="forgot_password.php">Forgot your password?</a></p>
            </div>

    </body>
</html>
