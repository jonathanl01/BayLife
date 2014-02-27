<!--
    Author: Jianjun Li
    Description: Registration for normal user
-->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/registration.css">
        <title>Registration</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        require_once('navbar.php');
        ?>  
        <div class="container">
            <div class="registration">
                <form class="form-signup" name="signup_form" method="post" action="registration.php">
                    <h2 class="form-signup-heading">Registration</h2>
                    <?php
                    if (isset($_POST['submit2'])) {
                        //     echo 'form submitted';
                        // Grab the profile data from the POST
//    $password1 = mysql_real_escape_string($connection, trim($_POST['password1']));
//    $password2 = mysql_real_escape_string($connection, trim($_POST['password2']));

                        $firstname = $_POST['fname'];
                        $lastname = $_POST['lname'];
                        $username = $_POST['uname'];
                        $email = $_POST['email'];
                        $password1 = $_POST['password'];
                        $password2 = $_POST['confirmed_password'];
                        
                        $query = "SELECT * FROM Customer_Table WHERE email_id = '$email'";
                        $query2 = "SELECT * FROM Customer_Table WHERE user_name = '$username'";
                        $data = mysql_query($query);
                        $data2 = mysql_query($query2);
                        if (!empty($password1) && !empty($password2) && ($password1 == $password2) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && valid_password($password1)) {

                            if (mysql_num_rows($data) == 0 && mysql_num_rows($data2) == 0) {
                                // The email is unique, so insert the data into the database
                                $query = "INSERT INTO Customer_Table (first_name,last_name,user_name,email_id,password)
                              VALUES ( '$firstname','$lastname','$username', '$email',SHA('$password1') )";
                                mysql_query($query);

                                
                                echo 'Your new account has been successfully created. Go back to <a href="index.php">home</a> page.';

                                mysql_close($connection);
                                exit();
                            } else {
                                // An account already exists for this email, so display an error message
                            }
                        } else {
                            if (empty($firstname) || empty($lastname) || empty($username) ||
                                    empty($password1) || empty($password2) || empty($email)) {
                                echo "<font color='red'>Missing fields.<br/></font>";
                            }
                            if ($password1 != $password2) {
                                echo "<font color='red'>Password fields must be the same.<br/></font>";
                            }
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo "<font color='red'> Enter a valid email. <br/></font>";
                            }
                            if (!valid_password($password1)) {
                                echo "<font color='red'> Invalid password. Must have at least 2 uppercase, 2 lowercase, 2 digit and 6 characters in length.<br/></font>";
                            }
                            if (mysql_num_rows($data) > 0 && !empty($email)) {
                                echo "<font color='red'>An account already exists for this email. Please use a different address.<br/></font>";
                            }
                            if (mysql_num_rows($data2) > 0 && !empty($username)) {
                                echo "<font color='red'>An account already exists with this username. Please use a different one.<br/></font>";
                            }
                        }
                    }
//  echo 'form not submitted';
                    mysql_close($connection);

                    function valid_password($pass) {
                        $r1 = '/[A-Z]/';
                        $r2 = '/[a-z]/';
                        $r3 = '/[0-9]/';
                        $o = array();
                        if (preg_match_all($r1, $pass, $o) < 2)
                            return FALSE;

                        if (preg_match_all($r2, $pass, $o) < 2)
                            return FALSE;

                        if (preg_match_all($r3, $pass, $o) < 2)
                            return FALSE;

                        if (strlen($pass) < 6)
                            return FALSE;

                        return TRUE;
                    }
                    ?>     

                    <p>
                        <label>First Name</label>
                        <input type="text" class="form-control" maxlength="20" name="fname" autofocus value="<?php if (!empty($firstname)) {
                        echo $firstname;
                    } ?>">
                    </p>

                    <p>
                        <label>Last Name</label>
                        <input type="text" class="form-control" maxlength="20" name="lname" value="<?php if (!empty($lastname)) {
                        echo $lastname;
                    } ?>">
                    </p>
                    <p>
                        <label>User Name</label>
                        <input type="text" class="form-control" maxlength="20" name="uname" value="<?php if (!empty($username)) {
                        echo $username;
                    } ?>">
                    </p>
                    <p>
                        <label>Email</label>
                        <input type="email" class="form-control" maxlength="40" name="email" value="<?php if (!empty($email)) {
                        echo $email;
                    } ?>">
                    </p>
                    <p>
                        <label>Password </label> (must contain at least 2 uppercase, 2 lowercase, 2 digits and at least 6 characters in length)
                        <input type="password" class="form-control" maxlength="20" name="password">
                    </p>
                    <p>
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" maxlength="20" name="confirmed_password">
                    </p>
                    <p>
                        <button class="btn btn-default">Upload Profile Picture</button>
                    </p>
                    <p>
                        <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit2"></input>
                    </p>
                    <p>
                        By clicking on the "Submit" button, you are agreeing to the <a href="terms_and_conditions.php">"Terms and Conditions"</a>.
                    </p>
                </form>
                <!-- <button class="btn btn-default" onclick="window.location = 'login.php';">Already a member? Click here!</button> -->
            </div>
        </div>
        <br>
    </body>
</html>