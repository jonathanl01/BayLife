
<!DOCTYPE html>
<html>
  <head>
    <title>BayLife</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <style>
    body{
        background: url(img/HomepageBackground.jpg);
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
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        
                
    
    <?php
    include('navbar.php');      
    ?>

    <script type="text/javascript">
        
    </script>
    <!-- Tabs -->
    <div class="container center">
        <h1>BayLife</h1>
        <ul class="nav nav-tabs" id="myTab">
            <li class="default"><a href="#search" class="" contenteditable="false">Search All</a>
            </li>
            <li><a href="#food" class="" contenteditable="false">
                    Restaurants  <span class="glyphicon glyphicon-cutlery"></span></a>
            </li>
            <li><a href="#hotels" class="" contenteditable="false">
                    Hotels  <span class="glyphicon glyphicon-home"></span></a>
            </li>
     
        </ul>
        <div class="tab-content">
            <div class="tab-pane active align-left searchBar" id="search">
                <div class="form-group ">
                    <br>
                    <form action="reviewResults.php" method="GET">
                        <input type="text" class="form-control" placeholder="Enter Restaurant/Hotel, City" name="search_all">
                        <br>
                        <button type="submit" class="btn btn-default" >Search</button>
                    </form>
                    
                </div>

                
            </div>
            <div class="tab-pane searchBar" id="food">
                <div class="form-group ">
                    <br>
                    <form action="reviewResults.php" method="GET">
                        <input type="text" class="form-control" placeholder="Enter Restaurant/Hotel, City" name="search_restaurants">
                        <br>
                        <button type="submit" class="btn btn-default" >Search</button>
                    </form>
                    
                </div>

                
            </div>
            <div class="tab-pane searchBar" id="hotels">
                <div class="form-group ">
                    <br>
                    <form action="reviewResults.php" method="GET">
                        <input type="text" class="form-control" placeholder="Enter Restaurant/Hotel, City" name="search_hotels">
                        <br>
                        <button type="submit" class="btn btn-default" onClick="window.location.href='reviewResults.php'">Search</button>
                    </form>
                </div>
               
               
            </div>
            
        </div>
        <h3>SFSU-FAU-FULDA joint SW Engineering Project Fall 2013</h3>
    </div>
    <div id="footer">
        <a href="terms_and_conditions.php" style="background-color:#ffffff"><font color="black" ><strong>Terms and conditions</strong></font></a>
    </div>
    
     <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

        
     <script>
        
        $(document).ready(function() {
        
            $('#myTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            });

            $(function () {
                $('#myTab a:first').tab('show');
            })
            
            $("#loginButton").click(function(){
                
                $('#username').text($('#loginUsername').val());
                $('#welcomeUser').show();
                $("#loginSection").hide();
                
            })
        });
        
    </script>
  </body>
</html> 