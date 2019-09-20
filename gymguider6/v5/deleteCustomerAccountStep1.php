<?php
 
if(isset($_POST['submit']))
 {
   
   include("sessioncustomer.php"); 
$myusername=$_SESSION['login_customer']; 
     
      
	   
	   $sqlupdate2 = "DELETE from users  WHERE username='$myusername'";
 
       //echo  $sqlupdate;
       mysqli_query($db, $sqlupdate2);
      
          
          header("location: logout.php");
  }
  ?>