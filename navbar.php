
<div class="navbar navbar-default navbar-fixed-top">
    <a class="navbar-brand" href="index.php"><font size="7">BayLife</font></a>
    <div class="container" >
        <div class="navbar-header"> 
            
        </div>
        <?php
        session_start();
        // If the session vars aren't set, try to set them with a cookie
        if (!isset($_SESSION['cust_id'])) {
            if (isset($_COOKIE['cust_id']) && isset($_COOKIE['user_name'])) {
                $_SESSION['cust_id'] = $_COOKIE['cust_id'];
                $_SESSION['user_name'] = $_COOKIE['user_name'];
            }
        }
        if (isset($_SESSION['cust_id'])) {
            echo '<span style="float:right"><br>Welcome ';
            if (isset($_SESSION['user_name'])) {
                echo $_SESSION['user_name'] . ', ';
            } elseif (isset($_COOKIE['user_name'])) {
                echo $_COOKIE['user_name'] . ', ';
            }
            echo '<a href="logout.php">Log out</a></span>';
        } else {
            ?>


            <form class="navbar-form navbar-right" role="form" method="post">

                <div id="loginSection">
                    <div class="form-group">
                        <input type="text"  class="form-control" placeholder="Username" name="user_name">
                    </div>
                    <div class="form-group">
                        <input  type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <input type="submit" class="btn btn-default" value="Login"  name="submit_login" >
                    or
                    <button type="button" class="btn btn-default" value="Register" onClick="window.location.href = 'registration.php';">Register</button>
                </div> 
                <!--<div id="welcomeUser" style="display: none;">
                    hola, <a href="userpage.html"id="username"></a>
                </div> -->
            </form>


        <?php }
        ?> 
        <div class="collapse navbar-collapse">
            <button type="button" onClick="window.location.href = 'reviewSearch.php'" class="btn btn-default navbar-btn">Write a review</button>
        </div><!--/.nav-collapse -->
    </div>
</div>   


<?php
define('DB_HOST', 'sfsuswe.com');
define('DB_USER', 'f13g07');
define('DB_PASSWORD', '640group7');
define('DB_NAME', 'student_f13g07');

$connection = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$connection) {
    die("\n\nDatabase connection failed:" . mysql_error());
}

$database = mysql_select_db(DB_NAME, $connection);
if (!$database) {
    die("Database selection failed:" . mysql_error());
}


if (!isset($_SESSION['cust_id'])) {
    //  echo '<h2 style = "align=right;">Currently not logged in</h2>';
    if (isset($_POST['submit_login'])) {
        //       echo 'submit is clicked';
        // Grab the user-entered log-in data
//      $user_email = mysqli_real_escape_string($dbc, trim($_POST['email']));
//      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        $user_name = $_POST['user_name'];
        $user_password = $_POST['password'];

        if (!empty($user_name) && !empty($user_password)) {


            $query = "SELECT * FROM Customer_Table WHERE user_name='$user_name' AND password=SHA('$user_password')";
            $data = mysql_query($query);


            if (!$data) {
                die("query failed" . mysql_error());
            }

            if (mysql_num_rows($data) == 1) {


                $row = mysql_fetch_array($data);
                $_SESSION['cust_id'] = $row['cust_id'];
                $_SESSION['user_name'] = $row['user_name'];
                setcookie('cust_id', $row['cust_id'], time() + (60 * 30));    // expires in 30 mins
                setcookie('user_name', $row['user_name'], time() + (60 * 30));  // expires in 30 mins
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                header('Location: ' . $home_url);
            } else {
                // The email/password are incorrect so set an error message
                echo "<font color='red'>You must enter a valid email and password to log in.</font>";
            }
        } else {
            if ((empty($user_name)) && (!empty($user_password))) {
                echo "<font color='red'>Username field is empty.</font>";
            } else if (((empty($user_password)) && (!empty($user_email)))) {
                echo "<font color='red'>Password field is empty.</font>";
            } else {
                echo "<font color='red'>Username and Password field are empty.</font>";
            }
        }
    } else {
        //   echo 'submit not working';
    }
} else {
    // echo('<p class="login"><h2 style = "align=right;">You are logged in as</h2> ' . $_SESSION['email'] . '. <a href="logout.php">Log out</a>.</p>');
}
?>
