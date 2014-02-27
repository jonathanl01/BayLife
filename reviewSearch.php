<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=true"></script>
        <script src="classes/map.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Review Search</title>
        <style>
            body{
                background-position: top;

            }
            tab-content{
                background-color: white;
            }
            .v-center{
                margin: 50%;
            }
            .container-full {
                margin: 0 auto;
                width: 100%;
                min-height:100%;
                background-color:#110022;
                color:#eee;
                overflow:hidden;
            }
            .center{
                width: 700px;
                height: 300px;
                background-color:rgba(255,255,255,0.5);


                border-radius: 5px;

                position: absolute;
                top:0;
                bottom: 0;
                left: 0;
                right: 0;

                margin: auto;
            }
            #myTab{
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
                background-color: rgb(232,232,232);

            }
            #myTab:active{
                background-color: white;
            }
            .tab-pane{
                background-color: white;
                border-bottom-left-radius:  5px;
                border-bottom-right-radius: 5px;
                border-bottom: 1px solid #ddd;
                border-right: 1px solid #ddd;
                border-left: 1px solid #ddd;

            }
            .nav-tabs > .active > a,
            .nav-tabs > .active > a:hover,
            .nav-tabs > .active > a:focus {
                color: #555555;
                cursor: default;
                background-color: #ffffff;
                border: 1px solid #ddd;
                border-bottom-color: transparent;
            }
            .searchBar{
                padding: 10px;

            }
            #footer {
                position:fixed;
                bottom:0px;
                height:30px;
                text-align: center;
                color: black;
                width:100%;
            }
        </style>
    </head>
    <body>
        <?php
        include('navbar.php');
        ?>
        <div class="container center">
            <h1>Write A Review</h1>
            <ul class="nav" id="myTab">
                <li class="default"><a href="#search" class="" contenteditable="false">Where Do You Want To Review?</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active align-left searchBar" id="search">
                    <div class="form-group ">
                        <br>
                        <form action="reviewResults.php" method="GET">
                            <input type="text" class="form-control" placeholder="Enter Restaurant/Hotel, City" name="search_all">
                            <br>
                            <button type="submit1" class="btn btn-default" onClick="window.location.href = 'results.php'">Search</button>
                        </form>

                    </div>


                </div>


            </div>
        </div>

    </body>
</html>
