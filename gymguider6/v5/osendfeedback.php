<?php
// Turn off all error reporting
error_reporting(0);
?>

<?php
    include("sessionowner.php");   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Owner -Home page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <style>
#footer{
        background-color: rgba(184,184,183,0.4);
        height:120;
    }
    
</style>
<script>
    // hide the message
    $(document).ready(function(){//open the main function
  setTimeout(function() { $("#msg").hide(); }, 1500);
  });
    </script>
</head>
<body>

<div class="header">
<div class="row">
 <div class="col-sm-3">
 <a href="owner-main.php">
 <img id ="logo"
     src="img/gym.png"
     width="220"
     height="120"
     alt="GymsGuider Logo"
/></a>
</div>
<div class="col-sm-3 d-flex align-items-right"> 
</div>
 <div class="col-sm-3 d-flex align-items-center"> 
 
 <div class="btn-group">
      <button type="button" class="btn btn-outline-secondary">

          <img src="img/ChangeCurrency.jpg"
               width="15"
               height="15"
               alt ="change currency"/>
          Change currency</button>
      <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Dollars</a>
        <a class="dropdown-item" href="#">Riyal</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
	 <a class="btn btn-outline-dark" href="addgym.php" role="button">Add a GYM</a>

 </div>

 <div class="col-sm-3 d-flex align-items-center"> 
 <li class="dropdown">
    <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
        <img src="img/user1.png"  height="80" width="80" class="img-circle special-img"> </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-cog"></i> Account</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign-out</a></li>
                </ul>
</li>
<p style="color:blue;"><?php echo "Welcome: ".$_SESSION['login_owner']; ?></p>

</div>
 <div class="col-sm-2 d-flex align-items-center">
 
 </div>
 <div class="col-sm-2 d-flex align-items-center">

 </div>
 <div class="col-sm-2 d-flex align-items-center">

 </div>
</div>
</div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
<div class="container">
<br>
<div id="msg">
<?php
if (isset($_GET['message'])){//open the if statement
     // Display sucessful message
     echo $_GET['message'];
}//close the if statement
?>
</div>
<br><br>
<div style="margin-left:12%">
<h3> What is your opinion about the website?</h3>
<br><br>
<div class="row">

<div class="col-sm-10">

<div class="row">
  <!---the same faces ued in the send feedback-->
<i class="far fa-grin-beam fa-5x col-sm-2"></i>
<i class="far fa-smile fa-5x col-sm-2"></i>
<i class="far fa-flushed fa-5x col-sm-2"></i>
<i class="far fa-frown fa-5x col-sm-2"></i>
<i class="far fa-grimace fa-5x col-sm-2"></i>
</div>

<!--- Satisfaction-------->
<div class="row">
<div class="col-sm-2">Extremely satisfied</div>
<div class="col-sm-2" style="margin-right:0.5%;">Satisfied </div>
<div class="col-sm-2"> Neutral</div>
<div class="col-sm-2">Unsatisfied</div>
<div class="col-sm-2">Extremely unsatisfied</div>
</div>
<!--- Satisfaction-------->

<form method="POST" action="osendfeedbackcode.php">
<!----------------------------------------------->
<p>
<label class="radio-inline col-sm-2">
    <input type="radio" name="c1"  value="4" checked><!-- set it to default, for testing purposes-->
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c1" value="3" >
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c1" value="2" >
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c1" value="1" >
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c1" value="0" >
    </label>
</p>

<div class="form-group">
<label for="comment">Write your feedback</label>
<textarea class="form-control" rows="5" id="comment" name="description" required></textarea>
</div>
<!----------------------------------------------->
<div id="err">
<?php
if (isset($_GET['err'])){//open the if statement
     // Display sucessful message
     echo "<label style='color:red;font-size:16px;'>".$_GET['err']."</label>";
}//close the if statement
?>
</div>
<!----------------------------------------------->
<!----------------------------------------------->
  <button type="submit" name ="customer-feedback"class="btn btn-success" style="width:100px">Send</button>

<!----------------------------------------------->
  </form>
</div>
</div>
</div>
</div>
<br><br>
<footer id="footer" class="page-footer">
    <br/>
    <div class="row">

</span>

    <span style=" position: relative; left: 37%; color:#131355 ; font-size: 13px"> <b> Copyright &copy 2019 GymsGuider. All rights reserved.</b></span>
    <p style=" position: relative; left: 44%; font-size: 13px;"> <a href="#"> About us</a> | <a href="#">Contact us</a> </p>
    <br/>

</div>


</footer>
</body>
</html>
