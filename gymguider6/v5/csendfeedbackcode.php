<?php
include("sessioncustomer.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $description= mysqli_real_escape_string($db,$_POST['description']);  
    $myusername=$_SESSION['login_customer'];
    $c1=$_POST['c1'];
    $sql="INSERT INTO feedback(username,rate,description,usertype)
    VALUES('$myusername', '$c1','$description','Customer')";
      mysqli_query($db,$sql);

      header("location: csendfeedback.php?message=<div class='alert alert-success' role='alert'>Your feedback is sent sucessfully</div>");

}



?>