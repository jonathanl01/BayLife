<!--
    Author: Jianjun Li
    Description: Registration for business owner
-->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/registration.css">
        <title>Registration for Business Owner</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
       <?php
         require_once('navbar.php');
       ?>
            <div class="registration">
                <form class="form-signup" name="signup_form">
                    <h2 class="form-signup-heading">Registration for Business Owner</h2>
                    <p>
                        <label>First Name</label>
                        <input type="text" class="form-control" maxlength="20" name="fname" autofocus>
                    </p>

                    <p>
                        <label>Last Name</label>
                        <input type="text" class="form-control" maxlength="20" name="lname">
                    </p>
                    <p>
                        <label>User Name</label>
                        <input type="text" class="form-control" maxlength="20" name="uname">
                    </p>
                    <p>
                        <label>Email</label>
                        <input type="email" class="form-control" maxlength="20" name="email">
                    </p>
                    <p>
                        <label>Password</label>
                        <input type="password" class="form-control" maxlength="20" name="password">
                    </p>
                    <p>
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" maxlength="20" name="confirmed_password">
                    </p>
                                        <p>
                        <label>Address</label>
                        <input type="text" class="form-control" maxlength="40" name="email">
                    </p>
                                        <p>
                        <label>City</label>
                        <input type="text" class="form-control" maxlength="20" name="email">
                    </p>
                                        <p>
                        <label>State</label>
                        <input type="text" class="form-control" maxlength="10" name="email">
                    </p>
                                        <p>
                        <label>Email</label>
                        <input type="email" class="form-control" maxlength="20" name="email">
                    </p>
                    <p>
                        <button class="btn btn-default">Upload Profile Picture</button>
                    </p>
                    <p>
                        <button class="btn btn-lg btn-primary btn-block">Submit</button>
                    </p>
                    <p>
                        By clicking on the "Submit" button, you are agreeing to the <a href="terms_and_conditions.php">"Terms and Conditions"</a>.
                    </p>
                </form>
                <button class="btn btn-default" onclick="window.location = 'login.php';">Already a member? Click here!</button>
            </div>
    </body>
</html>
