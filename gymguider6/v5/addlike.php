<!-------------------------------------------------------------------------------------------------------->


<!------------Insert like gyms query----------->
<?php
    include("sessioncustomer.php");
	
    $f_id=$_REQUEST["f_id"];
	 $myusername=$_SESSION['login_customer'];  
	$f=1;
	
		$sql7= "SELECT customer_like FROM gym_rate WHERE id='$f_id'";
      $result7 = mysqli_query($db,$sql1);
      $row7 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	  
      $user=$myusername.$row7['customer_like'];
	
	

	$sql1= "SELECT * FROM gym_rate WHERE customer_like = '$user' and no_like='$f' and id='$f_id'";
      $result1 = mysqli_query($db,$sql1);
      $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	  
      $id=$row1['id'];
      $count = mysqli_num_rows($result1);
     if($count==0){
         
      $sql2= "SELECT * FROM gym_rate WHERE customer_like = '$user' and no_dislike='$f' and id='$f_id' ";
      $result2 = mysqli_query($db,$sql2);
      $row2 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
 
      $count2 = mysqli_num_rows($result2);
         if($count2==1){ //to remove like
      $f2=0;
    $sql = "SELECT no_like ,no_dislike FROM gym_rate where id='$f_id'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $like_no=$row['no_like']+1;
  $f2=$row['no_dislike']-1;
  $sqlupdate = "UPDATE gym_rate SET customer_like = '$user',no_dislike='$f2',no_like='$like_no' WHERE id='$f_id'";
	 mysqli_query($db,$sqlupdate);}
	
	if($count2==0){
  $sql = "SELECT no_like FROM gym_rate where id='$f_id'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $like_no=$row['no_like']+1;
  
  $sqlupdate = "UPDATE gym_rate SET customer_like = '$user',no_like='$like_no' WHERE id='$f_id' ";	
  mysqli_query($db,$sqlupdate);
	} 
	 }


    ?>
   

    


<!-------------------------------------------------------------------------------------------------------->
