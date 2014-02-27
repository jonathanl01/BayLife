<?php
$conection = mysql_connect("sfsuswe.com", "f13g07", "640group7");
if (!$conection) {
    die("Database connection failed:" . mysql_error());
}
$database = mysql_select_db('student_f13g07', $conection);
if (!$database) {
    die("Database selection failed:" . mysql_error());
}

$start = 0;
if (isset($_REQUEST['start'])) {
    $start = $_REQUEST['start'];
}
$search = "";
$query = "";

if (isset($_REQUEST['search_all'])) {
    $search = $_GET['search_all'];
    $query = "SELECT * FROM Business_Table where city Like '%" . $search . "%' or name Like '%" . $search . "%'";
    $type = 1;
} elseif (isset($_REQUEST['search_restaurants'])) {
    $search = $_GET['search_restaurants'];
    $query = "SELECT * FROM Business_Table where (city Like '%" . $search . "%' or name Like '%" . $search . "%') And type = 'restaurant'";
    $type = 2;
} elseif (isset($_REQUEST['search_hotels'])) {
    $search = $_GET['search_hotels'];
    $query = "SELECT * FROM Business_Table where (city Like '%" . $search . "%' or name Like '%" . $search . "%') And type = 'hotel'";
    $type = 3
    ;
} else {
    $type = $_GET['type'];
    $search = $_GET['search'];
    switch ($type) {
        case 1:
            $query = "SELECT * FROM Business_Table where city Like '%" . $search . "%' or name Like '%" . $search . "%'";
            break;
        case 2:
            $query = "SELECT * FROM Business_Table where (city Like '%" . $search . "%' or name Like '%" . $search . "%') And type = 'restaurant'";
            break;
        case 3:
            $query = "SELECT * FROM Business_Table where (city Like '%" . $search . "%' or name Like '%" . $search . "%') And type = 'hotel'";
            break;
    }
}

$result = mysql_query($query) or die($query . "<br/><br/>" . mysql_error());

$biz_results = array();
while ($row = mysql_fetch_array($result)) {
    $biz_results[] = $row;
}

$total_rows = mysql_num_rows($result);

if (isset($_REQUEST['items'])) {
    $max_results = $_REQUEST['items'];
} else {
    $max_results = 5;
}
$button_count = ceil($total_rows / $max_results);
mysql_close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=true"></script>
        <script src="classes/map.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <style>
            .col-md-3 {
                padding-top: 133px;
            }
            #sidebar.affix {
                position: fixed;
            }
            #sidebar
            {
                position: absolute;
                right: 20px;
                top: 200px;
                width: 220px;
            }
        </style>
    </head>
    <body>
        <?php
        include('navbar.php');
        ?>
        <div class="container ">   
            <br><br><br>  

            <div align="center">
                <div align="center">

                    <ul class="pagination">
                        <?php
                        if ($start - $max_results >= 0) {
                            print "<li><a href=\"results.php?start=" . ($start - $max_results) . "&search=" . $search . "&type=" . $type . "&items=" . $max_results . "\">Prev</a></li>";
                        }
                        if ($total_rows > $max_results) {
                            for ($j = 0; $j < $button_count; $j++) {
                                if ($j != ($start / $max_results)) {
                                    print"<li><a href=\"results.php?start=" . ($j * $max_results) . "&search=" . $search . "&type=" . $type . "&items=" . $max_results . "\"><u>" . ($j + 1) . "</u></a></li>";
                                } else {
                                    print"<li><a href=\"results.php?start=" . ($j * $max_results) . "&search=" . $search . "&type=" . $type . "&items=" . $max_results . "\"><b>" . ($j + 1) . "</b></a></li>";
                                }
                            }
                        }
                        if ($start + $max_results < $total_rows) {
                            print "<li><a href=\"results.php?start=" . ($start + $max_results) . "&search=" . $search . "&type=" . $type . "&items=" . $max_results . "\">Next</a></li>";
                        }
                        ?>
                    </ul>
                </div>

                <h5><-- Showing <?php
                    if ($total_rows > $start + $max_results) {
                        echo ($start + 1) . '-' . ($start + $max_results);
                    } else {
                        echo ($start + 1) . '-' . $total_rows;
                    }
                    ?> out of <?php print $total_rows; ?> Results -->  
                    <span align="right">    
                        <form method="post" id="items_per_page" action="<?php print "results.php?start=0&search=" . $search . "&type=" . $type . ""; ?>">Items Per Page:  
                            <select name="items" onchange="document.getElementById('items_per_page').submit();">
                                <option value="--">Filter by</option>
                                <option value="1">1</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="15">15</option>
                                <option value="25">25</option>
                            </select>
                        </form></span>

                </h5>
            </div>

            <div class="container">
                <?php
                for ($i = 0; $i < $max_results; $i++) {
                    if ($start + $i > $total_rows - 1) {
                        break;
                    }
                    ?>
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <div class="thumbnail padding2">
                                <h4 style="text-align:left;float:left;"><?= $i + 1 + $start ?>. <a href="business.php?biz_id=<?= $biz_results[$i + $start]['biz_id']; ?>"><?= strtoupper($biz_results[$i + $start]['name']) ?></a> </h4>
                                <h4 style="text-align:left;float:right;">    User rating: <?= $biz_results[$i + $start]['rating'] ?> /10</h4>
                                <hr COLOR="green" WIDTH="0%">
                                <a href="business.php?biz_id=<?= $biz_results[$i + $start]['biz_id']; ?>"><img src=<?= $biz_results[$i + $start]['img'] ?> width="200" height="150" style="width:190px;height:120px;padding-right:10px;padding-bottom:3px; " align="left" class="img-rounded" ></a>
                                <div class="caption">
                                    <div class="padding1">
                                        <p style="text-align:left;float:left;" >
                                            <b><?= strtoupper($biz_results[$i + $start]['type']) ?></b><br>
                                            <?= $biz_results[$i + $start]['street'] ?><br> 
                                            <?= $biz_results[$i + $start]['city'] ?><br> 
                                            <?= $biz_results[$i + $start]['phone'] ?><br><br></p>
                                        <?php
                                        $review_result = mysql_query("Select review_description From (Business_Table Join Review_Table on Business_Table.biz_id = Review_Table.biz_id) Where Review_Table.biz_id = " . $biz_results[$i + $start]['biz_id'] . " Order By review_id DESC Limit 0,1");
                                        $review = mysql_fetch_array($review_result);
                                        if ($review != 0) {
                                            ?>
                                            <p style="margin-left:500px;" ><?php
                                                echo "<b>Latest Review:</b><br>";
                                                print $review['review_description'];
                                            }
                                            ?><br><br><br></p>
                                        <hr COLOR="green" WIDTH="0%"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($biz_results[$i + $start]['lat'] > 0) {
                        echo "<script>var obj = {name: '" . ($i + $start + 1) . ". " . strtoupper($biz_results[$i + $start]['name']) . "', lat: " . $biz_results[$i + $start]['lat'] . ", lng: " . $biz_results[$i + $start]['lng'] . "}; markers.push(obj);</script>";
                    }
                }
                ?>
            </div>
      


            <div align="center">
                <ul class="pagination">
                    <?php
                    if ($start - $max_results >= 0) {
                        print "<li><a href=\"results.php?start=" . ($start - $max_results) . "&search=" . $search . "&type=" . $type . "&items=" . $max_results . "\">Prev</a></li>";
                    }
                    if ($total_rows > $max_results) {
                        for ($j = 0; $j < $button_count; $j++) {
                            if ($j != ($start / $max_results)) {
                                print"<li><a href=\"results.php?start=" . ($j * $max_results) . "&search=" . $search . "&type=" . $type . "&items=" . $max_results . "\"><u>" . ($j + 1) . "</u></a></li>";
                            } else {
                                print"<li><a href=\"results.php?start=" . ($j * $max_results) . "&search=" . $search . "&type=" . $type . "&items=" . $max_results . "\"><b>" . ($j + 1) . "</b></a></li>";
                            }
                        }
                    }
                    if ($start + $max_results < $total_rows) {
                        print "<li><a href=\"results.php?start=" . ($start + $max_results) . "&search=" . $search . "&type=" . $type . "&items=" . $max_results . "\">Next</a></li>";
                    }
                    ?>
                </ul>
            </div>
            
                  <div class="panel panel-default" id ="sidebar" align="center">
                <div class="panel-body">
                    <div id="map" style= "width:190px; height:350px;"></div>
                    <script>initialize();</script> 
                </div>
            </div>
        </div>
        <script>
            if (markers.length > 0) {
                draw_markers(markers);
            }

            $(document).ready(function() {

                $('#sidebar').affix({
                    offset: {
                    }
                });

            });
        </script>
    </body>
</html>