<?php
$biz_id = $_REQUEST['biz_id'];
?>

<html>
    <head>
        
        <link rel="stylesheet" type="text/css" href="header.css" >
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
        <link rel = "stylesheet" type = "text/css" href ="css/normalize.css" media ="screen">
       
        <link rel = "stylesheet" type = "text/css" href ="css/grid.css" media ="screen">
        <link rel = "stylesheet" type = "text/css" href ="css/style.css" media ="screen">
        
    </head>

<body>

  <?php
    require_once('navbar.php');
  ?>
    
    
    <?php
        $conection = mysql_connect("sfsuswe.com", "f13g07", "640group7");
        if (!$conection) {
        die("Database connection failed:" . mysql_error());
        }
        $database = mysql_select_db('student_f13g07', $conection);
        if (!$database) {
            die("Database selection failed:" . mysql_error());
        }
    ?>
    
    
   <div class="container">
   <br>
   <br>
        
     <?php
    
    //get the business information
     $counter=0;
     $bizquery= "SELECT * FROM Business_Table WHERE biz_id='$biz_id'";
     $biz=mysql_query($bizquery);
     $biz_info = mysql_fetch_assoc($biz);
     $name = $biz_info['name'];
     
     echo  "<H1 class ='grid_12'> $name </H1> ";
     echo "<br><br>";
     ?>
   
   <?php
   //get the customer id 
   if(isset($_SESSION['cust_id'])){
      $customer = $_SESSION['cust_id'];
   echo "<div>
       
       <form action=\"gallery.php?biz_id=$biz_id\" method=\"POST\" enctype=\"multipart/form-data\">
           <label>File: </label>
           <input type=\"file\" name=\"image\"><input type=\"submit\" value=\"Upload\">
            <p>
            <label>Description:</label>
            <input type=\"text\" class=\"form-control\" name=\"Description\">
       <?php echo $biz_id; ?>
        </p>
       </form>
   </div>";
   } else {
    echo "<div style=\"font-weight:bold;\">Please <a href=\"login.php\">Login</a> to upload a photo for this business.</div>";
   }
   ?>
       
       
   <?php
   if(isset($_POST['Description'])){
       $description = $_POST['Description'];
    
   } else {
       $description = '';
   }
   // image file properties
   if(isset($_FILES['image']['tmp_name']))
   {
       $file = $_FILES['image']['tmp_name'];
       
       $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
       $image_name = addslashes($_FILES['image']['name']);
       $image_size = getimagesize($_FILES['image']['tmp_name']);
       
       // the directory where the image is to be stored 
       $target = "img/";
       $target = $target . $image_name;
       
       if($image_size == FALSE)
           echo "Thats not an image";
       else 
       {
           if(!$insert = mysql_query("INSERT INTO Gallery_Table VALUE ('','$target','$description','$customer','$biz_id','')"))
               echo "Problem uploading image";
           if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
           }
           else
           {
               echo "An error occured";
           }
       }
   } else 
   {
       
   }
   
   
   //get the gallery information
    $galleryquery= "SELECT * FROM Gallery_Table WHERE biz_id='$biz_id'";
    $gal=mysql_query($galleryquery) ;

    if (!$gal) {
            ie("query failed" . mysql_error());
        }
        
   else if (mysql_num_rows($gal) == 0) {
            echo "No one has added photos for this restaurant. Be the first!";
        }
    else{  
           //display the photos 
           while($gal_array=mysql_fetch_array($gal)){
                $counter+=1;
                //echo $counter;
                $photo= $gal_array["photo"];
                $caption =$gal_array["caption"];

                echo "

                    <div id = \"pictures\" class =\"grid_5\" style=\"width: 405px; font-size:80%; text-align:center;\" >
                    <img src = $photo height =\"200\" width =\"400\" style=\"padding-bottom:0.5em;\" /> $caption

                    </div>";

                }
         }
           
         
 
    ?>
    
   
  </div>
</body>
</html>