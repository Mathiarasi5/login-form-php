<?php
 //require "dbconfig/config.php";
 session_start();
?> 
<html>
    <head>
		<title>Home page</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
    </head>
    <body style="background-color:white">
    <div id="main-wrapper" >
       <center><h2>HOME PAGE</h2>
       <h3><center><b>Welcome
            <?php echo $_SESSION['Username'] ?>
    </b></center></h3>
   <br><br>
    <?php echo'<img class="image" src="'. $_SESSION['imagelink'].'">'; ?>
    <br><br>
       <form class="myform" action="index.php" method="post" >
           
           
        <input type="submit" name="logout" value="logout" id="logout">
      
        </div>
       </form>
       <?php


if(isset($_POST["logout"]))
          {
           session_destroy();
           header('location:index.php'); 
          
          }
    ?>
    </body>
</html>