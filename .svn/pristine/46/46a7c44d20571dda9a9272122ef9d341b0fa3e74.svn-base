<?php
    $conection = mysql_connect("sfsuswe.com", "f13g07", "640group7");
    if (!$conection) {
        die("Database connection failed:" . mysql_error());
    }

    $database = mysql_select_db('student_f13g07', $conection);
    if (!$database) {
        die("Database selection failed:" . mysql_error());
    }
    
    $name = $_GET['write'];

    $sql = "INSERT INTO Name (name)
    VALUES('$name')";
    echo $name;
    
    mysql_query($sql);
    //mysql_query($conection, $sql);

//    if (!mysqli_query($conection,$sql)) {
//        die('Error: ' . mysqli_error($conection));
//    }
    echo "1 record added";

    mysql_close($conection);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
