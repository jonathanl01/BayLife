<?php
        $conection = mysql_connect("sfsuswe.com", "f13g07", "640group7");
        if(!$conection){
            die("Database connection failed:" . mysql_error());
        }
        
        $database = mysql_select_db('student_f13g07', $conection);
        if(!$database){
            die("Database selection failed:" . mysql_error());
        }
        
        $city = $_GET['search'];
        
        $query = "SELECT * FROM Results where city = '$city'"; //You don't need a ; like you do in SQL
        $result = mysql_query($query) or die($myQuery."<br/><br/>".mysql_error());
        
        $row = mysql_fetch_array($result);
        $total_rows = mysql_num_rows($result);

        mysql_close();
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <?php for($i = 0; $i < $total_rows; $i++) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['price'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
