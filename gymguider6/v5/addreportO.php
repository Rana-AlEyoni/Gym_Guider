<!-------------------------------------------------------------------------------------------------------->


<!------------Insert report list query----------->
<?php
   include("sessionowner.php");
    $f_id=$_REQUEST["f_id"];
    $sql = "SELECT * FROM gym_rate where id='$f_id'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $description=$row['description'];
 $myusername=$_SESSION['login_owner'];  
    $sql="INSERT INTO reportreview(rate_id,customer,feedback)
	            VALUES('$f_id', '$myusername','$description')";
                mysqli_query($db,$sql);

  

?>

<!-------------------------------------------------------------------------------------------------------->
