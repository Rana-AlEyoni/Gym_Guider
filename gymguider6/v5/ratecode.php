<?php
    include("sessioncustomer.php");   
    $message="";
    if($_SERVER["REQUEST_METHOD"] == "POST") {

      $c1=$_POST['c1'];
      $c2=$_POST['c2'];
      $c3=$_POST['c3'];
      $c4=$_POST['c4'];
      $c5=$_POST['c5'];
      $c6=$_POST['c6'];
      $c7=$_POST['c7'];
      $c8=$_POST['c8'];
      $description= mysqli_real_escape_string($db,$_POST['description']);  
      $gymtId= mysqli_real_escape_string($db,$_POST['gymtId']);  
      $myusername=$_SESSION['login_customer'];

      $sql = "SELECT * FROM gym_rate WHERE customer = '$myusername' and gym_id='$gymtId'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
      $count = mysqli_num_rows($result);
      if($count==1){
		   
         // $message="You can not rate same gym twice";
		echo '<script language="javascript">';
		echo 'history.go(-2);';
echo 'alert("you can not rate same gym twice")';

echo '</script>';


		    
      }
      else{

		  
        $allrate= round(($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8)/8);
        $sql = "SELECT * FROM gyms where id='$gymtId' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $newRateNumber=$row["no_rates"]+1;

        $newrateValue=round(($row["rate"]*$row["no_rates"]+$allrate)/($newRateNumber));
        $newc1=round(($row["c1"]*$row["no_rates"]+$c1)/($newRateNumber));
        $newc2=round(($row["c2"]*$row["no_rates"]+$c2)/($newRateNumber));
        $newc3=round(($row["c3"]*$row["no_rates"]+$c3)/($newRateNumber));
        $newc4=round(($row["c4"]*$row["no_rates"]+$c4)/($newRateNumber));
        $newc5=round(($row["c5"]*$row["no_rates"]+$c5)/($newRateNumber));
        $newc6=round(($row["c6"]*$row["no_rates"]+$c6)/($newRateNumber));
        $newc7=round(($row["c7"]*$row["no_rates"]+$c7)/($newRateNumber));
        $newc8=round(($row["c8"]*$row["no_rates"]+$c8)/($newRateNumber));

        $sql="INSERT INTO gym_rate(gym_id,customer,c1,c2,c3,c4,c5,c6,c7,c8,allrate,description)
        VALUES('$gymtId', '$myusername', '$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8',
        '$allrate','$description')";
          mysqli_query($db,$sql);

          $sqlupdate = "UPDATE gyms SET rate='$newrateValue', no_rates='$newRateNumber', c1='$newc1', c2='$newc2', c3='$newc3',
           c4='$newc4', c5='$newc5', c6='$newc6', c7='$newc7', c8='$newc8' WHERE id='$gymtId'";
        mysqli_query($db,$sqlupdate);
       		echo '<script language="javascript">';
		echo 'history.go(-2);';
echo 'alert("Tank you,click ok")';

echo '</script>';
      }

    }
    ?>

