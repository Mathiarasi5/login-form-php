<?php
 require "dbconfig/config.php";


?> 
<html>
    <head>
		<title>login page</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <script type="text/javascript">
        function PreviewImage()
        {
            var oFReader= new FileReader();
            oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
            oFReader.onload=function (oFREvent)
            {
                document.getElementById("upload").src=oFREvent.target.result;
            };
            };
        



        </script>
    </head>
    <body >
        <font size=6px>
    <div id="main-wrapper">
       <center><h2>REGISTER FORM</h2></center>
       <div class="myform">
       <form class="myform" action="register.php" method="post" enctype="multipart/form-data">
           
         <img  id="upload" src="https://www.shareicon.net/data/2016/09/01/822711_user_512x512.png" class="image">
         <br>
             <input type="file" id="imglink" class="inputbox" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();">
             <br>
           <label><b>User-name:</b></label>
           <input type="text" name="username" class="inputbox"  placeholder="Enter your name" id="name" required>
           <br>
           <br>
           <label><b>Password:</b></label>
           <input type="password" name="password" class="inputbox" placeholder=" your password" id="pass" required>
           <br><br>
           <label><b>Confirm Password:</b></label>
           <input type="password" name="cpassword" class="inputbox" placeholder="confirm your password" id="pass" required>
           <br><br>
          <b>Gender:</b> 
           <input type="radio" name=gender class="inputround" id="radio"  value="male" checked><b>Male</b>
           <input type="radio" name=gender class="inputround" id="radio"  value="female"checked><b>Female</b>
           <br><br>
           <b>Section:</b>
           <select name="class" class="inputbox">
               <option>CSE -A</option>
               <option>CSE -B</option>
               <option>CSE -C</option>
               <option>CSE -D</option>
           </select><br><br>
           <input type="submit" name="loginbtn" value="register" id="login">
           <br><br>
       <a href="index.php"><input type="button" value="back to login" id="backbtn">
       <br>
        </font>   
</form>
        </div>
        <?php
          if(isset($_POST["loginbtn"]))
          {
            // echo "<script type='text/javascript'> alert('worked'); </script>";
          
          $name=$_POST["username"];
          $pass=$_POST["password"];
          $encryption=md5($pass);
          $cpass=$_POST["cpassword"];
          $gender=$_POST["gender"];
          $class=$_POST["class"];
          $img_name=$_FILES['imglink']['name'];
          $img_size=$_FILES['imglink']['size'];
          $img_tmp=$_FILES['imglink']['tmp_name'];
          $directory='upload/';
          $target_file=$directory.$img_name;


         

                    if($pass==$cpass)
                    
                    {
                        $sqlcommand="SELECT * FROM loginform WHERE loginform.Username='$name'";
                        $result=mysqli_query($connect,$sqlcommand);
                       
                        if(!$result && mysqli_num_rows($result)>0)
                        {
                        echo "<script type='text/javascript'> alert('already exits'); </script>";
                        }
                        else if(file_exists( $target_file))
                        {
                            echo "<script type='text/javascript'> alert('Image file already exits'); </script>";
                        }
                        else if( $img_size>2097152)
                        {
                            echo "<script type='text/javascript'> alert('Image size greater than 2 MB'); </script>";
                        }
                        
                        else{
                            move_uploaded_file( $img_tmp, $target_file);
                            $sqlcommand="INSERT INTO loginform VALUES('','$name','$encryption','$gender','$class',' $target_file')";
                            $query_run=mysqli_query($connect,$sqlcommand);
                            if( $query_run)
                            {
                                echo "<script type='text/javascript'> alert('user enterd ..'); </script>";

                            }
                               }
                    }
                
        
          else {
            echo "<script type='text/javascript'> alert('password do not get matched'); </script>";
         
                }
        }
        ?>
       </form>
    </div>
    </body>
</html>