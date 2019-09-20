<?php
 
if(isset($_POST['submit']))
 {
   
   include("sessionowner.php"); 
$myusername=$_SESSION['login_owner'];  
     
       $sqlupdate = "DELETE from gyms  WHERE owner='$myusername'";
	   
	   $sqlupdate2 = "DELETE from users  WHERE username='$myusername'";
       //echo  $sqlupdate;
       mysqli_query($db, $sqlupdate);
       //echo  $sqlupdate;
       mysqli_query($db, $sqlupdate2);
      
          
          header("location: logout.php");
  }
  ?>