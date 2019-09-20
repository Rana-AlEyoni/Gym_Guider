
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
    include("sessioncustomer.php");   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer-Home page</title>
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
	
	.btnsearch {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 10px 14px;
  font-size: 14px;
  cursor: pointer;
  height: 38px;}
  
</style>
 <script>
    // hide the message
    $(document).ready(function(){//open the main function
  setTimeout(function() { $("#msg").hide(); }, 1500);
  });
    </script>
</head>
<body>

<?php require("cheader.php");?>
<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <h1 style="color:white">What GYMs are you looking for ?</h1>
    <form action="csearch.php" method="post" style="color:white">      
    <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="searchby" value="byname" checked>Gym name
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="searchby" value="bycity">City name
  </label>
</div>
<br>
<br>
<div class="form-group form-inline">
<input type="text"  pattern=".{3,}"   required title="3 characters minimum" class="form-control col-sm-5" id="qsearch" name="qsearch">&nbsp;
    <button type="submit" class="btnsearch"> Search</button>
    </div>

</form>
</div>
</div>
  
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

<form method="POST" action="csendfeedbackcode.php">
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
<?php require("footer.php");?>

</body>
</html>
