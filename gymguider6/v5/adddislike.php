<!-------------------------------------------------------------------------------------------------------->


<!------------Insert dislike to gym query----------->
<?php
    include("sessioncustomer.php");
		      $myusername=$_SESSION['login_customer'];
    $f_id=$_REQUEST["f_id"];
$f=1;

	$sql1= "SELECT * FROM gym_rate WHERE customer_like = '$myusername' and no_dislike='$f' and id='$f_id'";
      $result1 = mysqli_query($db,$sql1);
      $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
 
      $count = mysqli_num_rows($result1);
     if($count==0){
         
      $sql2= "SELECT * FROM gym_rate WHERE customer_like = '$myusername' and no_like='$f' and id='$f_id'";
      $result2 = mysqli_query($db,$sql2);
      $row2 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
 
      $count2 = mysqli_num_rows($result2);
         if($count2==1){ //to remove like
   
    $sql = "SELECT no_dislike ,no_like FROM gym_rate where id='$f_id'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $dislike_no=$row['no_dislike']+1;
  $f2=$row['no_like']-1;
  $sqlupdate = "UPDATE gym_rate SET customer_like = '$myusername',no_dislike='$dislike_no',no_like='$f2' WHERE id='$f_id'";
	 mysqli_query($db,$sqlupdate);}
	 
	 	if($count2==0){
  $sql = "SELECT no_dislike FROM gym_rate where id='$f_id'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $like_no=$row['no_dislike']+1;
  
  $sqlupdate = "UPDATE gym_rate SET customer_like = '$myusername',no_dislike='$like_no' WHERE id='$f_id'";	
  mysqli_query($db,$sqlupdate);
	}
	 
	 
	 }
  

    ?>


<!-------------------------------------------------------------------------------------------------------->
