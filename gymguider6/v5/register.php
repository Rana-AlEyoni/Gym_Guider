
<?php
// Turn off all error reporting
error_reporting(0);
?>

<?php
    include("config.php");
	$message="";
  session_start();
  $q1=file_get_contents('countries.json');
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($q1, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);
$countries=array();
$ii=0;
foreach ($jsonIterator as $key => $val) {
	
    if(is_array($val)) {
        //echo "$key,";
		$countries[$ii]=$key;
		$ii++;
		
    } 
	//else {
        //echo "$val,";
    //}
	//echo '<br>';
	
}
//echo 	$countries[19];
$countries_size = count($countries);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
       
         $myusername = mysqli_real_escape_string($db,$_POST['username']);
         $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
         $myname= mysqli_real_escape_string($db,$_POST['name']); 
         $myemail= mysqli_real_escape_string($db,$_POST['email']); 
		 $myphone= mysqli_real_escape_string($db,$_POST['phone']); 
     $country = mysqli_real_escape_string($db,$_POST['country']); 
     $cities= mysqli_real_escape_string($db,$_POST['cities']); 
     $gender=$_POST['gender'];
     $age = mysqli_real_escape_string($db,$_POST['age']); 

         $sql = "SELECT * FROM users WHERE username = '$myusername' or email= '$myemail'";
         $result = mysqli_query($db,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
         $count = mysqli_num_rows($result);
	  
	     if($count==1){
                
                
						echo '<script language="javascript">';
		echo 'history.go(-1);';
echo 'alert("The user name or email is exists!!!")';

echo '</script>';
				
                
            }else{
				

                $sql="INSERT INTO users(name,username,password,email,phone,type,isActive,country,city,age,gender)
	            VALUES('$myname', '$myusername', '$mypassword','$myemail','$myphone','Customer','1','$country','$cities',
              '$age','$gender' )";
                mysqli_query($db,$sql);
				
								       		echo '<script language="javascript">';
							echo  'window.location.href="login.php";';
		
echo 'alert("Tank you,click ok")';

echo '</script>';
                //$message = $sql;
              //  header("location: login.php");
            }
			
			 
    }
    
   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register at GYM guider</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script>
  function showCity(str) {
    if (str == "") {
        document.getElementById("subdiv").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subdiv").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getcities.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
  <style>
  .bg-dark,.btn-secondary {
    background-color: #131355!important;
}
#footer{
        background-color: rgba(184,184,183,0.4);
        height:120;
    }
</style>
</head>
<body>

<?php require("vheader.php");?>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
<div class="container">
  
  <h5> Register as a customer </h5>
							<h5 style="color:red;"><?php echo $message; ?></h5>
  <br>
  <br>
  <div class="col-sm-4">
  <form action="" method="post">
  <div class="form-group">
  <h6 style="color:red;">*</h6>
    <label for="name">Full name :</label> 
    <input type="text" class="form-control" name="name" id="name" required>
  </div>
  <div class="form-group">
  <h6 style="color:red;">*</h6>
    <label for="username">User name :</label>
    <input type="text" class="form-control" name="username" id="username" required>
  </div>
<div class="form-group">
<h6 style="color:red;">*</h6>
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" title="your password should be at least 8 character and should include at least: 1 capital letter ,small letter and 1 number,1 symbol" pattern="(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="password" id="pwd"   required  >
  </div>
  <div class="form-group">
  <h6 style="color:red;">*</h6>
    <label for="cpwd">Confirm Password :</label>
    <input type="password" class="form-control" oninput="check(this)" pattern="(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"  id="cpwd" required>
  </div>
  <script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('pwd').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
  <div class="form-group">
  <h6 style="color:red;">*</h6>
    <label for="email">Email address  :</label>
    <input type="email" class="form-control" name="email" id="email" required>
  </div>
  <div class="form-group">
  <h6 style="color:red;">*</h6>
    <label for="phone">Phone number :</label>
    <input type="number" class="form-control" title="Ten digits" required pattern="[0-9]{10}" name ="phone" id="phone">
  </div>
  <div class="form-group">
    <label for="phone">Age :</label>
  <input type="number" name="age" min="12" max="99" pattern="[0-9]{2}">
  </div>
  <div class="form-group">
    <label for="gender">Gender:</label>
    <select class="form-control" id="gender" name="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
  </select>
  </div>
  <div class="form-group">
  <div class="form-group">
    <label for="country">country:</label>
    <select class="form-control" id="country" name="country"  onchange="showCity(this.value)">

     <?php for ($x = 0; $x < $countries_size; $x++)
{
?>
  <option value="<?php echo $countries[$x]; ?>"><?php echo $countries[$x]; ?></option>
 

<?php } ?>
</select>
    </div>
    <br>

    <div class="form-group" id="subdiv">
    <label for="cities">city:</label>
   
      <select name="cities"  class="form-control" id="cities">
     <option>Select city</option>
     </select>
    </div>
    
  </div>
  <button type="submit" class="btn btn-primary" >Register</button><!-- onclick="return confirm('successfully registered ,click ok');"-->
</form>
</div>
  </div>
  <br><br>
<?php require("footer.php");?>
</body>
</html>
