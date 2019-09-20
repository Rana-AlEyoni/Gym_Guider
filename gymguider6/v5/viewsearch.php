
<?php
// Turn off all error reporting
error_reporting(0);
?>

<?php
    include("sessioncustomer.php");  
    $query = "
    SELECT * FROM gyms
   ";
   $searchby=$_GET["searchby"];
   $qsearch=$_GET["qsearch"];
  
    if($searchby=='byname'){
      $query .= "
      WHERE name LIKE '%$qsearch%' AND isActive=1 
    ";
    }
    else if($searchby=='bycity'){
      $query .= "
      WHERE city LIKE '%$qsearch%' AND isActive=1 
    ";
    }

    
    $result = mysqli_query($db,$query); 
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
  height: 38px;
}
    
</style>
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
<div class="row">
<?php while($row1 = mysqli_fetch_array($result)):;
				
					
        ?>
		
<div class="card col-dm-6" style="width:1000px; height:200px; margin-top:3%; background-color: rgba(184,184,183,0.4); padding:1%">
<img  class="card-img-top" src="<?php echo "uploads/".$row1['image'];?>" alt="Gym Logo" style="width:210px; margin:2%;">
<div style ="position: relative; margin-left:28%; margin-top:-18%;" class="card-body">
<h3 class="card-title"><?php echo $row1['name']; ?> </h3>



<p class="card-text"><?php echo printValue($row1['price'])." per month";?></p>
<p class="card-text"><?php echo $row1['no_rates']." Rates";?></p>
<button type="submit" style ="width :20%;" class="btn btn-dark" id="Delete">
     <a href="cgymdetail.php?id=<?php echo $row1['id'];?>" style="color:white;">View details</a>
                                                                   
                                                                  </button>

                                                                  
</div>
</div>
<?php endwhile;
?>
</div>
</div>
<br><br>
<?php require("footer.php");?>

</body>
</html>
