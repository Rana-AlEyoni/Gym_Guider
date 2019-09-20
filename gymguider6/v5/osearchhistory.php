<?php
// Turn off all error reporting
error_reporting(0);
?>

<?php
    include("sessionowner.php");  
    $myusername=$_SESSION['login_owner']; 
    $sql = "SELECT * FROM searchhistory where username='$myusername'";
    $result = mysqli_query($db,$sql); 
    
	
	
    
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

    
    $i = mysqli_query($db,$query); 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Owner search history</title>
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
<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <h1 style="color:white">What GYMs are you looking for ?</h1>
    <form action="osearch.php" method="post" style="color:white">      
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
<table class="table table-striped">
    <thead>
      <tr>
        <th>Keywords</th>
        <th>Search by</th>
        <th>datetime</th>
        <th># results</th>
        <th>View</th>

      </tr>
    </thead>
    <tbody>
    <?php while($row1 = mysqli_fetch_array($result)):; ?>

      <tr>
        <td><?php echo $row1['query']; ?> </td>
        <td><?php echo $row1['search_by']; ?></td>
        <td><?php echo $row1['datetime']; ?> </td>
        <td><?php echo $row1['no_results']; ?></td>
		
		
         <td> <a href="oviewsearch.php?searchby=<?php echo $row1['search_by'];?>&qsearch=<?php echo $row1['query'];?>">View</a></td>
		
		
      </tr>
      <?php endwhile;?>
				
					
    </tbody>
  </table>
</div>
</div>
<br><br>
<?php require("footer.php");?>

</body>
</html>
