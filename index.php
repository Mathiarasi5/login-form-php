 <?php
 require "dbconfig/config.php";
 
 
 
 
 session_start();
 ?> 
<html>
    <head>
		<title>login page</title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    </head>
    <body id="body" align="justify">
    <div id="main-wrapper">
       <center><h2>LOGIN FORM</h2></center>
       <form class="myform" action="index.php" method="post">
           <div align="center">
           <label><b>User-name</b></label><br>
           <input type="text"  name="username" class="inputbox" placeholder="Enter your name" id="name" required>
           <br>
           <br>
           <label><b>Password</b></label><br>
           <input type="password"  name="password" class="inputbox" placeholder="Enter your password" id="pass" required>
           <br><br>
        <input type="submit" name="login" value="login" id="login">
       <br><br>
       or not have account 
       <hr>

        <a href="register.php"><input type="button" value="register" id="registerbtn">
        </div>
       </form>
<?php
if(isset($_POST["login"]))
{
$username=$_POST["username"];
$pass=$_POST["password"];
$encryption=md5($pass);
$query="SELECT * FROM loginform WHERE Username='$username' && password='$encryption'";
$query_run=mysqli_query($connect,$query);
                       if(!$query_run||mysqli_num_rows($query_run)>0)
                        {
                       //valid;
       $row=mysqli_fetch_assoc($query_run);
                       $_SESSION['Username']=$row['Username'];
                       $_SESSION['imagelink']=$row['imagelink'];
                       header("location:home.php");
                        } 
                        else{
                          echo "<script type='text/javascript'> alert('invalid credentials'); </script>";
                        }
}
?>
    </div>
    </body>
</html>